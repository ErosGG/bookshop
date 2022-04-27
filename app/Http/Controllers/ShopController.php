<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Rules\CartItemRule;
use App\Rules\EnoughStock;
use App\Rules\OrderedQuantity;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ShopController extends Controller
{

    public function index(): View
    {
        $highlightedProducts = Product::where('highlighted', true)->paginate(10);

        $categories = Category::with('products')->get();

        return view('shop.index', [
            'highlightedProducts' => $highlightedProducts,
            'categories' => $categories,
            'highlightedCategories' => $categories->where('highlighted', true),
        ]);
//        return view('welcome');
    }


    public function search(): View
    {
        $products = Product::filterBy()->paginate(10);

        $categories = Category::with('products')->get();

        return view('shop.search', [
            'products' => $products,
            'categories' => $categories,
            'highlightedCategories' => $categories->where('highlighted', true),
        ]);
    }


    public function products(Category $category): View
    {
        $products = $category->products()->paginate(10);

        $categories = Category::with('products')->get();

        return view('shop.category', [
            'products' => $products,
            'category' => $category,
            'highlightedCategories' => $categories->where('highlighted', true),
        ]);
    }


    public function product(Product $product): View
    {
        $categories = Category::with('products')->get();

        return view('shop.product', [
            'product' => $product,
            'highlightedCategories' => $categories->where('highlighted', true),
        ]);
    }


    public function categories(): View
    {
        $categories = Category::all();

        return view('shop.categories', [
            'categories' => $categories,
            'highlightedCategories' => $categories->where('highlighted', true),
        ]);
    }


    public function cart(): View
    {
        $cookie = Cookie::get('cart');

        $cart = json_decode($cookie, true) ?? [];

        $products = Product::whereIn('id', array_keys($cart))->get();

        $cartItems = collect([]);

        foreach ($products as $product) {
            $cartItem = new CartItem($product, $cart[$product->id]['quantity']);

            $cartItems->push($cartItem);
        }

        return view('shop.cart', [
            'cartItems' => $cartItems,
            'highlightedCategories' => Category::where('highlighted', true)->get(),
        ]);
    }


    public function addToCart(Product $product)
    {
        $cookie = Cookie::get('cart');

        $cart = json_decode($cookie, true) ?? [];

        if (array_key_exists($product->id, $cart)) $cart[$product->id]['quantity']++;
        else $cart[$product->id] = ['quantity' => 1,];

        $cookie = cookie('cart', json_encode($cart), 60 * 24 * 30); // 30 days

        return redirect()->back()->cookie($cookie);
    }


    public function removeFromCart(Product $product)
    {
        $cookie = Cookie::get('cart');

        $cart = json_decode($cookie, true);

        if (array_key_exists($product->id, $cart)) unset($cart[$product->id]);

        $cookie = cookie('cart', json_encode($cart), 60 * 24 * 30); // 30 days

        return redirect()->back()->cookie($cookie);
    }


    public function checkout(Request $request)
    {
        $productsId = collect($request->input('products'))->keys();

        $data = ['products' => $productsId->toArray(),];

        Validator::make($data, [
            'products' => ['required', 'array', 'min:1'],
            'products.*' => ['required', 'integer', 'exists:products,id',],
        ])->validate();

        $quantities = collect($request->input('products'))->values();

        $cartItems = collect([]);

        $cart = collect([]);

        foreach ($productsId as $key => $productId) {
            $product = Product::find($productId);

            $cartItem = new CartItem($product, $quantities[$key]);

            $cartItems->push($cartItem);

            $cart[$product->id] = ['quantity' => $cartItem->quantity,];
        }

        $data = ['cartItems' => $cartItems->toArray(),];

//        Validator::make($data, [
//            'cartItems' => ['required', 'array', 'min:1'],
//            'cartItems.*' => [new OrderedQuantity(), new EnoughStock()],
//        ])->validate();

        $validator = Validator::make($data, [
            'cartItems' => ['required', 'array', 'min:1'],
            'cartItems.*' => [new OrderedQuantity(), new EnoughStock()],
        ]);

        if ($validator->fails()) {

            $failedRules = $validator->failed();

            foreach ($failedRules as $attribute => $rules) {

                foreach ($rules as $rule => $value) {

                    if ($rule === EnoughStock::class) {

                        $cartItemIdx = explode('.', $attribute)[1];

                        $cartItem = $data['cartItems'][$cartItemIdx];

                        if ($cartItem->product->stock > 0) {

                            $cartItem->quantity = $cartItem->product->stock;

                            $cart[$cartItem->product->id] = ['quantity' => $cartItem->quantity];

                        } else {

                            unset($cart[$cartItem->product->id]);
                        }
                    }
                }
            }
            Cookie::queue('cart', $cart->toJson(), 60 * 24 * 30); // 30 days

            return redirect()->back()->withErrors($validator)->withInput();
        }


//        Cookie::queue('cart', $cart->toJson(), 60 * 24 * 30); // 30 days

        Cookie::expire('cart');

//        return view('shop.checkout', [
//            'cartItems' => $cartItems,
//            'highlightedCategories' => Category::where('highlighted', true)->get(),
//        ]);


        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $cartItem) {
            $order->products()->attach($cartItem->product->id, [
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);

            $product = Product::find($cartItem->product->id);

            $product->stock -= $cartItem->quantity;

            $product->save();
        }

        return to_route('shop.index');
    }


    public function profile(User $user): View
    {
        $routeUser = $user;

        Gate::allowIf(fn ($authUser) => $authUser->uuid === $routeUser->uuid);

        return view('shop.user.profile', [
            'user' => $user,
            'highlightedCategories' => Category::where('highlighted', true)->get(),
        ]);
    }


    public function orders(User $user): View
    {
        $routeUser = $user;

        Gate::allowIf(fn ($authUser) => $authUser->uuid === $routeUser->uuid);

        $orders = $user->orders()->with('products')->paginate(10);

        return view('shop.user.orders', [
            'user' => $user,
            'highlightedCategories' => Category::where('highlighted', true)->get(),
            'orders' => $orders,
        ]);
    }


    public function order(User $user, Order $order): View
    {
        $routeUser = $user;

        Gate::allowIf(fn ($authUser) => $authUser->uuid === $routeUser->uuid);

        $order = $user->orders()->with('products')->find($order->id);

        $orderProducts = $order->products->pluck('pivot');

        $quantities = $orderProducts->pluck('quantity');

        $prices = $orderProducts->pluck('price');

        $total = $quantities->zip($prices)->map(function ($item) {
            return $item[0] * $item[1];
        })->sum();

        return view('shop.user.order', [
            'user' => $user,
            'highlightedCategories' => Category::where('highlighted', true)->get(),
            'order' => $order,
            'products' => $order->products,
            'total' => $total,
        ]);
    }


}
