<?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

require_once base_path('routes/api.php');


Route::post('/add-student', [StudentController::class, 'addStudent']);
Route::get('/students', 'ApiController@getStudents');
Route::get('/api/students', 'ApiController@getStudents');
Route::get('/students', 'StudentController@getStudents');
Route::get('/students', 'StudentController@index');