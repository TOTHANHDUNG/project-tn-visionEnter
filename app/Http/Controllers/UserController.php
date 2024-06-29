<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class UserController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = User::where('name','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url',request()->fullurl());
        }else{
            $data = User::paginate(5);
            Session::put('halaman_url',request()->fullurl());
        }
        return view('admin.user.data-account', compact('data'));
    }

    public function addaccount(){
        return view('admin.user.add-account');
    }

public function insertaccount(Request $request){
    $this->validate($request, [
        'name' => 'required|min:7|max:30',
        'email' => 'required|email|min:5|max:255|unique:users',
        'password' => 'required|min:5|max:255',
    ]);

    $data = $request->all();
    $data['password'] = Hash::make($request->password);

    $user = User::create($data);

    if ($request->hasFile('photo')) {
        $request->file('photo')->move('photodata/', $request->file('photo')->getClientOriginalName());
        $user->photo = $request->file('photo')->getClientOriginalName();
        $user->save();
    }

    return redirect()->route('data-account')->with('success', 'Data Berhasil Di tambahkan');
}

    public function editdataaccount($id){
        $data = User::find($id);
        // dd($data);

        return view('admin.user.editdata-account', compact('data'));
    }

    public function updateaccount(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success','Data Berhasil Di Update');
        }
        return redirect()->route('data-account')->with('success','Data Berhasil Di Update');
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('data-account')->with('success','Data Berhasil Di Update');
    }

    //login-logout-sign-up
    function login() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('admin.login');
    }

    function registration() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('admin.registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect()->route('login')->with('error', 'Chi tiết đăng nhập không hợp lệ!');
    }



    function registrationPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data['name'] = $request->name;
        $data['role'] = $request->role;
        if (!$request->has('role')) {
            $data['role'] = 'user'; // hoặc giá trị mặc định khác
        }
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        if (!$request->has('photo')) {
            $data['photo'] = $request->photo ?? '/avatar.png';
        }        
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error","Đăng ký thất bại, thử lại.");
        }
        return redirect(route('login'))->with("success","Đăng ký thành công - Đăng nhập để truy cập hệ thống!");

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function data() {
        $data = User::all(); // Lấy tất cả các khóa học
        return view('webfront.home', compact('data'));
    }
    
    public function forgetPass()
    {
        // Return the view for the forget password form
        return view('webfront.forgetpassword');
    }

    public function postForgetPass(Request $req)
    {
        // Validate the email input
        $req->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email hợp lệ',
            'email.exists' => 'Email này không tồn tại trong hệ thống'
        ]);

        // Generate a random ID
        $id = strtoupper(Str::random(10));

        // Find the user with the provided email
        $users = User::where('email', $req->email)->first();

        // Update the user's ID
        $users->update(['id' => $id]);

        // Send the email
        Mail::send('webfront.check_email_forget', compact('users'), function($email) use($users) {
            $email->subject('MyShopping - Lấy lại mật khẩu tài khoản');
            $email->to($users->email, $users->name);
        });

        // Redirect back with a success message
        return redirect()->back()->with('yes', 'Vui lòng check email để thực hiện thay đổi mật khẩu');
    }

    public function getPass($id)
    {
        return view('webfront.check_email_forget');
    }

    public function postGetPass(Request $req, $id)
    {
        // Implement the logic to handle the post password request
    }

    public function change_password()
    {        
        return view('webfront.user-action.change_password');
    }

    public function check_change_password(Request $req){
        $auth = auth('web')->user();
        $req->validate([
            'old_password' => ['required', function($attr, $value, $fail) use($auth){
                if(!Hash::check($value, $auth->password)){
                    $fail('Mật khẩu không chính xác');
                };
            }],
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $data['password'] = bcrypt($req->password);
        if($auth->update($data)){
            auth('web')->logout();
            return redirect()->route('admin.login')->with('ok', 'Cập nhật mật khẩu thành công!');
        }
        return redirect()->back()->with('no', 'Lỗi gì đó, làm ơn kiểm tra lại!'); 
    }

    //lấy thông tin người dùng và chuyển tới view quản lý thông tin cá nhân
    public function editProfile()
{
    $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
    return view('webfront.user-action.profile', compact('user'));
}

}    

