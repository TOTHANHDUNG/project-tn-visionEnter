<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\events; 


class TeacherController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Teacher::where('name','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url',request()->fullurl());
        }else{
            $data = Teacher::paginate(5);
            Session::put('halaman_url',request()->fullurl());
        }
        return view('admin.teacher.data-teacher', compact('data'));
    }

    public function addteacher(){
        return view('admin.teacher.add-teacher');
    }

    public function insertteacher(Request $request){
        $this->validate($request,[
            'name' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:25',
        ]);
        // dd($request->all());
        $data = Teacher::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('photodata/',$request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('data-teacher')->with('success','Data Berhasil Di tambahkan');
    }

    public function editteacher($id){
        $data = Teacher::find($id);
        // dd($data);

        return view('admin.teacher.edit-teacher', compact('data'));
    }

    public function updateteacher(Request $request, $id){
        $data = Teacher::find($id);
        $data->update($request->all());
    
        // Xử lý cập nhật ảnh nếu có
        if($request->hasFile('photo')){
            $request->file('photo')->move('photodata/',$request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
    
        if(session('halaman_url')){
            return redirect(session('halaman_url'))->with('success','Data Berhasil Di Update');
        }
        return redirect()->route('data-teacher')->with('success','Data Berhasil Di Update');
    }
    
    public function delete($id){
        $data = Teacher::find($id);
        $data->delete();
        return redirect()->route('data-teacher')->with('success','Data Berhasil Di Update');
    }

    public function teachers() {
        // $courses = Course::all(); // Lấy tất cả các khóa học
        $teacher_english = Teacher::where('language','english')->get();
        $teacher_korean = Teacher::where('language','korean')->get();

        return view('webfront.home', compact('teacher_english','teacher_korean'));
    }
}

