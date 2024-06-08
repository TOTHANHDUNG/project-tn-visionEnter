<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Movies;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\events; 


class CourseController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Course::where('name','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url',request()->fullurl());
        }else{
            $data = Course::paginate(5);
            Session::put('halaman_url',request()->fullurl());
        }
        return view('admin.course.data-course', compact('data'));
    }

    public function addcourse(){
        return view('admin.course.add-course');
    }

    public function insertcourse(Request $request){
        $this->validate($request,[
            'teacherid' => 'required|min:5|max:50',
            'name' => 'required|min:5|max:50',
        ]);
        // dd($request->all());
        $data = Course::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('photodata/',$request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('data-course')->with('success','Data Berhasil Di tambahkan');
    }

    public function editcourse($id){
        $data = Course::find($id);
        // dd($data);

        return view('admin.course.edit-course', compact('data'));
    }

    public function updatecourse(Request $request, $id){
        $data = Course::find($id);
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
        return redirect()->route('data-course')->with('success','Data Berhasil Di Update');
    }
    
    public function delete($id){
        $data = Course::find($id);
        $data->delete();
        return redirect()->route('data-course')->with('success','Data Berhasil Di Update');
    }

    public function courses() {
        // $courses = Course::all(); // Lấy tất cả các khóa học
        $course_english = Course::where('language','english')->get();
        $course_korean = Course::where('language','korean')->get();

        return view('webfront.course', compact('course_english','course_korean'));
    }

    public function uploadMedia($courseId)
    {
        $course = Course::where('id', $courseId)->first();

        return view('admin.course.upload-video', compact('course'));
    }
    public function uploadMediaHandle($courseId, Request $request)
    {
        $file = $request->file();
        $urls = $this->upload($file);
        $dataSave = [];
        foreach($urls as $url)
        {
            $data= [
                	'title' => 'test',	
                    'description' => "hoc hoc choc",	
                    'movie_url' => $url, 	
                    'CourseID' => 213,	
                    'GenrelD'=> 14, 
                    'TeacherID' => 1,
                    // "updated_at" =>time(),
                    // "created_at" =>time(),

            ];
            Movies::create($data);
        }
        dd( 'success');
        return view('admin.course.upload-video', compact('course'));
    }

    public function upload($files)
    {
        $urls = [];
        $i=0;
        foreach($files as $key => $file)
        {
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('media', $fileName, 's3');
            $test= $this->getSrcFromS3($path);
            $urls[$i] = $test;
            $i++;
        }
        
        return $urls;        
    }

    public function getSrcFromS3($pathFile)
    {
        if (\Storage::disk('s3')->exists($pathFile)) {
            return \Storage::disk('s3')->url($pathFile);
        }
        return null;
    }

    public function deleteVideo($movieID)
    {
        $movieID = Movies::find($movieID);
        ///delte images
        $delS3v = $this->deleteMedia($movieID->movie_url);
        $movieID->delete();

    }

    public function deleteMedia($pathFile)
    {
        $amazonS3 = \Storage::disk('s3');
        // If url
        if (filter_var($pathFile, FILTER_VALIDATE_URL)) {
            $explode = explode("visioncenter-products.s3.us-east-2.amazonaws.com" . "/", $pathFile);
            $pathFile = end($explode);
        }
        if ($amazonS3->has($pathFile)) {
            $result = $amazonS3->delete($pathFile);
        }
    }
}