<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student-management', compact('students'));
    }
    


    public function addStudent(Request $request)
    {
        // Xử lý thêm sinh viên vào cơ sở dữ liệu
        // ...
        
        return redirect('/student-management'); // Chuyển hướng đến trang xem danh sách
    }
    



    public function getStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }

}
