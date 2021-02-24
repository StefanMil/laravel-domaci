<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;

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
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', [CoursesController::class, 'index'])->name('dashboard');

    Route::get('/courses', [CoursesController::class, 'add'])->name('courses');
    Route::post('/courses', [CoursesController::class, 'create']);
    Route::post('/courses/enroll/{course}', [CoursesController::class, 'enroll']);
    Route::post('/courses/enroll/delete/{course}', [CoursesController::class, 'deleteEnroll']);
    Route::post('/courses/delete/{course}', [CoursesController::class, 'delete']);
    Route::post('/courses/edit/{course}', [CoursesController::class, 'edit']);
    Route::post('/courses/edit-course', [CoursesController::class, 'editCourse']);

    Route::get('/view-courses', [CoursesController::class, 'viewcourses'])->name('viewcourses');
});
