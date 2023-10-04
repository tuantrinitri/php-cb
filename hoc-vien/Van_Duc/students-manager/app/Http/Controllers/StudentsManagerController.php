<?php
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Route;
class StudentsManagerController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();

        return response()->json(['message' => 'Thêm sinh viên thành công']);
    }

    
}
