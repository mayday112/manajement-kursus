<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CourseController::class, 'index']);
// Route::get('/courses/{course:id}', function(Course $course){
//     $datas = $course->materials();
//     dd($course);
//     return view('materials.index', ['datas' => $datas]);
// });

// Route::get('/{course:slug}/materials', [CourseController::class, 'show']);

Route::resource('courses', CourseController::class);
Route::resource('materials', MaterialController::class);



