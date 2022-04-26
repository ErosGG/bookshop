<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;


class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::filterBy()->paginate(10)
        ]);
    }


    public function create(): View
    {
        return view('admin.categories.create');
    }


    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated()->push(Str::slug($request->name));

        Category::create($validated);

        return to_route('admin.categories.index');
    }


    public function show(Category $category): View
    {
        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }


    public function edit(Category $category): View
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }


    public function update(CategoryUpdateRequest $request, Category $category): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $relativePath = 'public/shop/uploads/images/categories/';

            $imageName = $category->slug . '.' . $image->getClientOriginalExtension();

            $request->file('image')->storeAs($relativePath, $imageName);

            $absolutePath = asset('storage/shop/uploads/images/categories/' . $imageName);

        }
//        else {
//            $absolutePath = 'storage/shop/images/products/default/' . 'no-cover.jpg';
//        }

        $data = $request->validated();

        $data['image'] = $absolutePath ?? $category->image;

        $category->update($data);

//        $category->update([
//            'name' => $request->name,
//            'slug' => Str::slug($request->name),
//            'highlighted' => $request->highlighted,
//            'description' => $request->description ?? null,
//            'image' => $absolutePath,
//        ]);

        return to_route('admin.categories.index');
    }


    public function delete(Category $category): RedirectResponse
    {
        $category->delete();

        return to_route('admin.categories.index');
    }
}
