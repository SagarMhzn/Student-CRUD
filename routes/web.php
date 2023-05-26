<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EducationController;

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



Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('home');
    });
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profile-update', [HomeController::class, 'profile_update'])->name('profile.update');
    Route::put('/password-update', [HomeController::class, 'password_update'])->name('password.update');

    Route::get('/students',[StudentController::class,'student_display'])->name('view-students');

    Route::get('/student-profile/{id}',[StudentController::class,'view_student_profile'])->name('view-profile');


    Route::get('/create-student', [StudentController::class, 'index'])->name('create-student');
    Route::post('/create-student', [StudentController::class, 'store'])->name('student.store');

    Route::get('/students-delete/{student}',[StudentController::class, 'destroy'])->name('delete-student');
    Route::get('/students-edit/{student}',[StudentController::class, 'edit'])->name('edit-student');

    Route::put('/students-update/{student}',[StudentController::class, 'update'])->name('update-student');
    
});






// Route::get('/add-education-info', [EducationController::class, 'index'])->name('add-info');

// Route::post('/add-education-info/{student_id}', [EducationController::class, 'store'])->name('education.store');



