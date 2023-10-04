<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExampleController;

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('student-management'); // Thay 'welcome' bằng tên view mà bạn muốn hiển thị trang chính.
});


Route::get('/api/students', 'ApiController@getStudents');

require_once base_path('routes/api.php');
Route::get('/example', 'ExampleController@index');
Route::get('/student-management', 'StudentController@index');
Route::post('/add-student', 'StudentController@addStudent');


Route::get('/', 'HomeController@index');


Route::get('/student-management', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'addStudent']);


Route::get('/example', [ExampleController::class, 'index']);
