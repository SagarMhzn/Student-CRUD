<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EducationController;
use PhpParser\Node\Expr\FuncCall;

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





Auth::routes();
Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    } else {
        return view('welcome');
    }
});


Route::middleware('auth')->group(function () {

    // Route::get('/', function () {
    //     return view('home');
    // });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/', 'index')->name('home');

        Route::get('/profile', 'userProfile')->name('user.profile');
        Route::get('/password/update', 'userPassword')->name('user.password');


        Route::put('/profile-update', 'profileUpdate')->name('user-profile.update');
        Route::put('/password-update', 'passwordUpdate')->name('user-password.update');
    });

    Route::controller(StudentController::class)->group(function () {

        Route::resource('student', StudentController::class);
        Route::get('/students', 'student_display')->name('view-students');
        Route::get('/student-profile/{id}', 'view_student_profile')->name('view-profile');
    });





    // Route::get('/create-student', [StudentController::class, 'index'])->name('create-student');
    // Route::post('/create-student', [StudentController::class, 'store'])->name('student.store');

    // Route::get('/students-delete/{student}',[StudentController::class, 'destroy'])->name('delete-student');
    // Route::get('/students-edit/{student}',[StudentController::class, 'edit'])->name('edit-student');

    // Route::put('/students-update/{student}',[StudentController::class, 'update'])->name('update-student');



});









// Route::get('/add-education-info', [EducationController::class, 'index'])->name('add-info');

// Route::post('/add-education-info/{student_id}', [EducationController::class, 'store'])->name('education.store');
