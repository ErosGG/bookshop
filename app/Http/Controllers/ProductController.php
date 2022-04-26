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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $relativePath = 'public/shop/uploads/images/products/';
            $imageName = $product->slug . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storeAs($relativePath, $imageName);
            $absolutePath = asset('storage/shop/uploads/images/products/' . $imageName);
        }
//        else {
//            $absolutePath = 'storage/shop/images/products/default/' . 'no-cover.jpg';
//        }

//        $data = collect($request->validated())->merge(['image' => $absolutePath]);

        $data = $request->validated();

        $data['image'] = $absolutePath ?? $product->image;

        $product->update($data);

//        $product->update([
//            'title' => $request->title,
//            'slug' => Str::slug($request->title),
//            'author' => $request->author,
//            'year' => $request->year,
//            'publisher' => $request->publisher,
//            'place' => $request->place,
//            'isbn' => $request->isbn,
//            'series' => $request->series,
//            'price' => $request->price,
//            'stock' => $request->stock,
//            'highlighted' => $request->highlighted,
//            'description' => $request->description,
//            'image' => $absolutePath,
//        ]);

        return to_route('admin.products.index');
    }


    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        return to_route('admin.products.index');
    }
}
