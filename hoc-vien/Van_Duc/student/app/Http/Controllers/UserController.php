<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Thêm dòng này để import Controller
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller // Sửa từ "Admin" thành "Controller"
{
    public function index()
    {
        $users = User::all(); // Lấy danh sách tất cả người dùng từ cơ sở dữ liệu
        return view('users.index', compact('users'));
    }
}
