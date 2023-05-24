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

Route::get('/', function () {
    return view('home');
});



Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/create-student', [StudentController::class, 'index'])->name('create-student');


    Route::post('/create-student', [StudentController::class, 'store'])->name('student.store');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');



// Route::get('/add-education-info', [EducationController::class, 'index'])->name('add-info');

// Route::post('/add-education-info/{student_id}', [EducationController::class, 'store'])->name('education.store');



