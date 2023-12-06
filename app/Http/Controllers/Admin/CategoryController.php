<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $title_website = 'Danh sách danh mục';
        $categories = Category::get(); // database

        return view('admin.news.category.index', compact('title_website','categories')); // view
    }

    public function create()
    {
        return view('admin.news.category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'title' => $request['title'],
            'url' => $request['url'],
        ]);
        return route('admin.new.category.index');
    }
}
