<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all(),
        ]);
    }


    public function create()
    {

    }


    public function store()
    {

    }


    public function show()
    {

    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }


    public function update()
    {

    }


    public function delete()
    {

    }
}
