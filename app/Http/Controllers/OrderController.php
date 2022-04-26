<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::filterBy()->paginate(10),
        ]);
    }


    public function show(Order $order)
    {
        $orderProducts = $order->products->pluck('pivot');

        $quantities = $orderProducts->pluck('quantity');

        $prices = $orderProducts->pluck('price');

        $total = $quantities->zip($prices)->map(function ($item) {
            return $item[0] * $item[1];
        })->sum();

        return view('admin.orders.show', [
            'order' => $order,
            'products' => $order->products,
            'total' => $total,
        ]);
    }
}
