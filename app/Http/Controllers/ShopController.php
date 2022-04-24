<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class ShopController extends Controller
{

    public function index(): View
    {
        $highlightedProducts = Product::where('highlighted', true)->paginate(10);

        $categories = Category::with('products')->get();

        $highlightedCategories = $categories->where('highlighted', true);

        return view('shop.index', [
            'highlightedProducts' => $highlightedProducts,
            'categories' => $categories,
            'highlightedCategories' => $highlightedCategories,
        ]);
//        return view('welcome');
    }


    public function search(): View
    {
        $products = Product::filterBy()->paginate(10);

        return view('shop.search', [
            'products' => $products,
        ]);
    }


    public function products(Category $category): View
    {
        $products = $category->products()->paginate(10);

        $categories = Category::with('products')->get();

        return view('shop.category', [
            'products' => $products,
            'category' => $category,
            'highlightedCategories' => $categories,
        ]);
    }


    public function product(Product $product): View
    {
        $categories = Category::with('products')->get();

        return view('shop.product', [
            'product' => $product,
            'highlightedCategories' => $categories,
        ]);
    }
}
