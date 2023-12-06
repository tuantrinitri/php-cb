<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;

class FontendController extends Controller
{
    public function index()
    {
        return view('fontend.index');
    }
}
