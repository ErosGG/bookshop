<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::all(),
        ]);
    }


    public function create(): View
    {
        return view('admin.categories.create');
    }


    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return to_route('admin.categories.index')
            ->with('success', 'Category created successfully');
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
        $category->update($request->validated());

        return to_route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }


    public function delete(Category $category): RedirectResponse
    {
        $category->delete();

        return to_route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
