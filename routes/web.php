<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager; // Sửa thành Controllers
use App\Http\Controllers\UserController; // Sửa thành Controllers
use App\Models\User;
use App\Http\Controllers\CourseController; // Sửa thành Controllers
use App\Http\Controllers\PricingController;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\TeacherController; // Sửa thành Controllers
use App\Models\Teacher;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('/admin',function(){
        //thống kê người dùng
        $allaccount = User::count();
        $allaccountuser = User::where('role','user')->count();
        $allaccountadmin = User::where('role','admin')->count();
        //thống kế khóa học
        $allcourse = Course::count();
        $courseenglish = Course::where('language','english')->count();
        $coursekorean = Course::where('language','korean')->count();

        $allteacher = Teacher::count();
        $teacherenglish = Teacher::where('language','english')->count();
        $teacherkorean = Teacher::where('language','korean')->count();
        return view('admin.welcome', compact('allaccount','allaccountuser','allaccountadmin','allcourse','courseenglish','coursekorean','allteacher','teacherenglish','teacherkorean'));
    });
    //acount
    Route::get('/data-account',[UserController::class, 'index'])->name('data-account');
    Route::get('/add-account',[UserController::class, 'addaccount'])->name('add-account');
    Route::post('/insertaccount',[UserController::class, 'insertaccount'])->name('insertaccount');
    Route::get('/editdata-account/{id}',[UserController::class, 'editdataaccount'])->name('editdata-account');
    Route::post('/updateaccount/{id}',[UserController::class, 'updateaccount'])->name('updateaccount');
    Route::get('/deleteaccount/{id}',[UserController::class, 'delete'])->name('deleteaccount');

    //course
    Route::get('/data-course',[CourseController::class, 'index'])->name('data-course');
    Route::get('/add-course',[CourseController::class, 'addCourse'])->name('add-course');
    Route::get('/upload-media/{id}', 'App\Http\Controllers\CourseController@uploadMedia');
    Route::post('/upload-media-handle/{id}', 'App\Http\Controllers\CourseController@uploadMediaHandle')->name('upload-media-handle');
    Route::get('/delete-movie/{id}', 'App\Http\Controllers\CourseController@deleteVideo');
    Route::post('/insertcourse',[CourseController::class, 'insertcourse'])->name('insertcourse');
    Route::get('/edit-course/{id}',[CourseController::class, 'editcourse'])->name('edit-course');
    Route::post('/updatecourse/{id}',[CourseController::class, 'updatecourse'])->name('updatecourse');
    Route::get('/deletecourse/{id}',[CourseController::class, 'delete'])->name('deletecourse');


    //teacher
    Route::get('/data-teacher',[TeacherController::class, 'index'])->name('data-teacher');
    Route::get('/add-teacher',[TeacherController::class, 'addteacher'])->name('add-teacher');
    Route::post('/insertteacher',[TeacherController::class, 'insertteacher'])->name('insertteacher');
    Route::get('/edit-teacher/{id}',[TeacherController::class, 'editteacher'])->name('edit-teacher');
    Route::post('/updateteacher/{id}',[TeacherController::class, 'updateteacher'])->name('updateteacher');
    Route::get('/deleteteacher/{id}',[TeacherController::class, 'delete'])->name('deleteteacher');


    //admin video
    Route::get('/movies/{courseID}',[CourseController::class, 'getMovies'])->name('getMovies');
    Route::get('/add-movie/{courseID}',[CourseController::class, 'addMovie'])->name('addMovie');
    Route::post('/add-movies-handle/',[CourseController::class, 'addMovieHandle'])->name('addMovieHandle');
    Route::get('/delete-video-handle/{movieId}',[CourseController::class, 'deleteMovieHandle'])->name('deleteMovieHandle');

});

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'loginPost'])->name('login.post');

Route::get('/registration', [UserController::class,'registration'])->name('registration');
Route::post('/registration', [UserController::class,'registrationPost'])->name('registration.post');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/forgetpassword', function () {
    return view('webfront.forgetpassword');
});

Route::get('/profile', function () {
    return view('webfront.user-action.profile');
});

Route::get('/billing', function () {
    return view('webfront.user-action.billing');
});

Route::get('/security', function () {
    return view('webfront.user-action.security');
});

Route::get('/notifications', function () {
    return view('webfront.user-action.notifications');
});

// Route::get('/forgetpassword', function () {
//     return view('admin.forgetpassword');
// });
// Route::get('/course', function () {
//     return view('webfront.course');
// });
Route::get('/course', 'App\Http\Controllers\CourseController@courses');


// Route::get('/english-detail/{id}', function () {

// });

Route::get('/course-detail/{id}',[CourseController::class, 'detail'])->name('course-detail');
Route::get('/learning/{courseId}', [CourseController::class, 'learning'])->name('learn');

Route::group(['prefix'=>'pricing','as'=>'pricing.'], function(){
    Route::get('create-transaction', [PricingController::class, 'createTransaction'])->name('createTransaction');
    Route::get('/charge/{id}',[PricingController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PricingController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PricingController::class, 'cancelTransaction'])->name('cancelTransaction');
});


Route::get('/', 'App\Http\Controllers\UserController@data')->name('home');


//khóa học


//giáo viên

Route::get('/home', 'App\Http\Controllers\TeacherController@teachers');

//đánh giá
Route::get('/ratings', [RatingsController::class, 'ratings'])->name('ratings');
Route::get('/edit-rating/{id}', [RatingsController::class, 'editrating'])->name('edit-rating');
Route::post('/updaterating/{id}', [RatingsController::class, 'updaterating'])->name('updaterating');
Route::get('/deleterating/{id}', [RatingsController::class, 'delete'])->name('deleterating');

Route::post('/save-rating', [RatingsController::class, 'saveRating'])->name('save-rating');
// Route::get('/showrating', [RatingsController::class, 'showrating'])->name('showrating');

// Route::get('/ratings','App\Http\Controllers\RatingsController@ratings');

//quản lý thông tin cá nhân
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/photo', [ProfileController::class, 'updateProfilePhoto'])->name('profile.updatePhoto');
});

//thống kê


// Route::get('/user-action', function(){
//     return view('webfront.user-action.all-action-user');
// });
//
// Route::get('/', [UserController::class, 'welcome'])->name('admin.welcome');

//auth social




