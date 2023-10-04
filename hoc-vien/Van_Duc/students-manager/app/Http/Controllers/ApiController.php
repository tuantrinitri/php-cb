<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Import lớp Student từ namespace của nó

class ApiController extends Controller
{
    public function getStudents() {
        // Xử lý lấy danh sách sinh viên từ cơ sở dữ liệu và trả về dưới dạng JSON
        $students = Student::all();
        return response()->json($students);
    }
}
