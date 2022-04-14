<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        auth()->check();

        return view('admin.products.index', [
            'products' => Product::paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(ProductStoreRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('admin.products.index');
    }


    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product,
        ]);
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }


    public function update()
    {

    }


    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
