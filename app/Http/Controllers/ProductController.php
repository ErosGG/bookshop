<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function index(): View
    {
        auth()->check();

        $products = Product::filterBy()->paginate(10);

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }


    public function create(): View
    {
        return view('admin.products.create');
    }


    public function store(ProductStoreRequest $request): RedirectResponse
    {

        $validated = $request->validated()->push(Str::of($request->title)->slug());

        Product::create($validated);



        return to_route('admin.products.index');
    }


    public function show(Product $product): View
    {
        return view('admin.products.show', [
            'product' => $product,
        ]);
    }


    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }


    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return to_route('admin.products.index');
    }


    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        return to_route('admin.products.index');
    }
}
