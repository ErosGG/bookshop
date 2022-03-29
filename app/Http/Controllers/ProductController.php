<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::all()
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


    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }


    public function update()
    {

    }


    public function delete()
    {

    }
}
