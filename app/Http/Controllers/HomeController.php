<?php

namespace App\Http\Controllers;
//route.php
class HomeController extends Controller
{
    public function index()
    {
     return  view('admin.welcome');
    }
}
