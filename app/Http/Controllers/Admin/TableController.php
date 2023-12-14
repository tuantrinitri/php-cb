<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Posts;
class TableController extends Controller
{
        public function index()
        {
            return view('admin.layout.index');
        }    
}