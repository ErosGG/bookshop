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
        $highlightedProducts = Product::where('highlighted', true)->get();

        $categories = Category::with('products')->get();

        return view('shop.index', [
            'highlightedProducts' => $highlightedProducts,
            'categories' => $categories,
        ]);
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

        return view('shop.category.products', [
            'products' => $products,
            'category' => $category,
        ]);
    }


    public function product(Product $product): View
    {
        return view('shop.product.show', [
            'product' => $product,
        ]);
    }
}
