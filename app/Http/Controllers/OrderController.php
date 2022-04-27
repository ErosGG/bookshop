<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::filterBy()->paginate(10),
            'options' => collect(Order::getStatuses())->mapWithKeys(fn ($item, $key) => [$key => $item]),
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


    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order,
            'options' => collect(Order::getStatuses())->mapWithKeys(fn ($item, $key) => [$key => $item]),
            'selected' => $order->status,
        ]);
    }


    public function update(Order $order, OrderUpdateRequest $request)
    {
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index', $order);
    }


    public function delete(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
