<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Movies;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\events;
use App\Models\Movie;
use App\Models\Teacher;
use App\Models\Transaction;

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

    public function addCourse(){
        $teachers = Teacher::get()->toArray();
        return view('admin.course.add-course', compact('teachers'));
    }

    public function detail($courseId)
    {
        $courseDetail = Course::where('id', $courseId)->first();
        $boughtCourse = null;
        if(Auth::check()){
            $boughtCourse = Transaction::where('course_id', $courseId)->where('user_id', Auth::user()->id)->first();
        }

        if(empty($courseDetail)){
            return false;
        }
        return view('webfront.course-detail', compact('courseDetail', 'boughtCourse'));
    }

    public function insertCourse(Request $request){
        // $this->validate($request,[
        //     'teacherid' => 'required',
        //     // 'name' => 'required|min:5|max:50',
        // ]);
        // dd($request->all());
        $data = $request->all();
        $data['video'] = '';
        unset($data['_token']);
        if($request->hasFile('photo')){
            $data['photo'] = $this->upload($data['photo']);

        }
        $result = Course::create($data);

        return redirect()->route('data-course')->with('success','Data Berhasil Di tambahkan');
    }

    public function editcourse($id){
        $data = Course::find($id);
        // dd($data);
        $teachers = Teacher::get();
        return view('admin.course.edit-course', compact('data', 'teachers'));
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

    public function upload($file)
    {
        $url = '';
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('media', $fileName, 's3');
        $url= $this->getSrcFromS3($path);
        return $url;
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
        $movieID = Movie::find($movieID);
        ///delte images
        $delS3v = $this->deleteMedia($movieID->movie_url);
        $movieID->delete();

    }

    public function deleteMedia($pathFile)
    {
        $amazonS3 = \Storage::disk('s3');
        // If url
        try{
            if (filter_var($pathFile, FILTER_VALIDATE_URL)) {
                // Extract path from the URL
                $parsedUrl = parse_url($pathFile);
                $pathFile = ltrim($parsedUrl['path'], '/');

                // Check if the file exists on S3 and delete it
                // if ($amazonS3->exists($pathFile)) {
                //     $result = $amazonS3->delete($pathFile);
                // }
            }

            return true;
        }
        catch(\Exception $e)
        {
            return true;
        }

    }

    public function getMovies($courseID)
    {
        $data = Movie::where('courseId', $courseID)->paginate(10);
        $course = Course::where('id', $courseID)->first();
        return view('admin.course.list-movie', compact('data', 'course'));
    }

    public function addMovie($courseID)
    {
        $course = Course::where('id', $courseID)->first();
        $teachers = Teacher::get();
        return view('admin.course.add-movie', compact('course', 'teachers'));
    }
    public function addMovieHandle(Request $request)
    {
        $file = $request->file();
        $url = $this->upload($file['video']) ?? null;
        $dataSave = $request->all();
        $dataSave['url']= $url;
        $dataSave['genreId'] = 1;
        unset($dataSave['_token']);
        unset($dataSave['video']);

        $result = Movie::create($dataSave);
        return redirect(route('getMovies', $dataSave['courseId']));
    }

    public function deleteMovieHandle($movieId)
    {
        $movie = Movie::find($movieId);
        ///delete images
        $delS3v = $this->deleteMedia($movie->url);

        Movie::where('id', $movieId)->delete();
        return redirect(route('getMovies', $movie->courseId));
    }

    public function learning($courseId)
    {
        $try = false;
        if(Auth::check())
        {
            $checkBuy = Transaction::where('course_id', $courseId)->where('user_id', Auth::user()->id)->first();
            $try = !empty($checkBuy) ? true : false;
        }
        $movies = Movie::where('courseId', $courseId);
        if(!$try)
        {
            $movies = $movies->limit(3)->get();
        }else{
            $movies = $movies->get();
        }
        return view('webfront.learning', compact('movies'));
    }
}

