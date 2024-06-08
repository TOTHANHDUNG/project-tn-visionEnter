<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager; // Sửa thành Controllers
use App\Http\Controllers\UserController; // Sửa thành Controllers
use App\Models\User;
use App\Http\Controllers\CourseController; // Sửa thành Controllers
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\TeacherController; // Sửa thành Controllers
use App\Models\Teacher;
use Laravel\Socialite\Facades\Socialite;
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


Route::get('/home', function () {
    return view('webfront.home');
})->name('home');

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

Route::get('/forgetpassword', function () {
    return view('admin.forgetpassword');  
});
Route::get('/course', function () {
    return view('webfront.course');  
});

Route::get('/english-detail', function () {
    return view('webfront.english-detail');  
});

Route::get('/try-learning', function () {
    return view('webfront.try-learning');  
});

//người dùng
// Route::get('admin', function () {
//     Route::get('', function(){
//         dd(1);
//     });
//     dd(1);
//     Route::get('/data-teacher',[TeacherController::class, 'index'])->name('admin-data-teacher');

// });

//người dùng
Route::get('/data-account',[UserController::class, 'index'])->name('data-account');
Route::get('/add-account',[UserController::class, 'addaccount'])->name('add-account');
Route::post('/insertaccount',[UserController::class, 'insertaccount'])->name('insertaccount');
Route::get('/editdata-account/{id}',[UserController::class, 'editdataaccount'])->name('editdata-account');
Route::post('/updateaccount/{id}',[UserController::class, 'updateaccount'])->name('updateaccount');
Route::get('/deleteaccount/{id}',[UserController::class, 'delete'])->name('deleteaccount');
Route::get('/home', 'App\Http\Controllers\UserController@data');


//khóa học
Route::get('/data-course',[CourseController::class, 'index'])->name('data-course');
Route::get('/add-course',[CourseController::class, 'addcourse'])->name('add-course');
Route::get('/upload-media/{id}', 'App\Http\Controllers\CourseController@uploadMedia');
Route::post('/upload-media-handle/{id}', 'App\Http\Controllers\CourseController@uploadMediaHandle')->name('upload-media-handle');
Route::get('/delete-movie/{id}', 'App\Http\Controllers\CourseController@deleteVideo');
Route::post('/insertcourse',[CourseController::class, 'insertcourse'])->name('insertcourse');
Route::get('/edit-course/{id}',[CourseController::class, 'editcourse'])->name('edit-course');
Route::post('/updatecourse/{id}',[CourseController::class, 'updatecourse'])->name('updatecourse');
Route::get('/deletecourse/{id}',[CourseController::class, 'delete'])->name('deletecourse');
Route::get('/course', 'App\Http\Controllers\CourseController@courses');

//giáo viên
Route::get('/data-teacher',[TeacherController::class, 'index'])->name('data-teacher');
Route::get('/add-teacher',[TeacherController::class, 'addteacher'])->name('add-teacher');
Route::post('/insertteacher',[TeacherController::class, 'insertteacher'])->name('insertteacher');
Route::get('/edit-teacher/{id}',[TeacherController::class, 'editteacher'])->name('edit-teacher');
Route::post('/updateteacher/{id}',[TeacherController::class, 'updateteacher'])->name('updateteacher');
Route::get('/deleteteacher/{id}',[TeacherController::class, 'delete'])->name('deleteteacher');
Route::get('/home', 'App\Http\Controllers\TeacherController@teachers');





//thống kê
Route::get('/',function(){
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

// Route::get('/user-action', function(){
//     return view('webfront.user-action.all-action-user');
// });
//
// Route::get('/', [UserController::class, 'welcome'])->name('admin.welcome');

//auth social

