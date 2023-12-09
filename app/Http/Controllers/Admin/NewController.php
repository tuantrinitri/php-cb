<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class NewController extends Controller
{
    public function index()
    {
        
        return view("admin.news.index");
    }

    public function create()
    {
        $categories = Category::get();
        return view("admin.news.index", compact("categories"));
    }


    public function store(Request $request)
    {
        dd($request->all());
        #code here
    }


}
