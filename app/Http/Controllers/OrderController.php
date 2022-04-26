<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::paginate(10),
        ]);
    }


    public function show(Order $order)
    {
        return view('admin.orders.show', [
            'order' => $order,
            'products' => $order->products,
            'orderProducts' => $order->products->pluck('pivot'),
        ]);
    }
}
