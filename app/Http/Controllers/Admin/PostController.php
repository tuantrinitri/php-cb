<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view("admin.posts.index");
    }

    public function create()
    {
        $categories = Post::get();
        return view("admin.posts.index", compact("posts"));
    }


    public function store(Request $request)
    {
        dd($request->all());
        #code here
    }


}
