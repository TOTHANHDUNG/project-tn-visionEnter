<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['role'] = $request->role;
        if (!$request->has('role')) {
            $data['role'] = 'user'; // hoặc giá trị mặc định khác
        }
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        if (!$request->has('photo')) {
            $data['photo'] = '/images/avatar.png';
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
    
}

