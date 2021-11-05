<?php

namespace App\Services;

use App\Models\Order\Order;
use Auth;

class OrderService {
    public function handleStoreFromCart($note)
    {
        $order_today = Order::whereDate('order_date', now())->count() + 1;
        $order_number = date('Ymd') . str_pad($order_today, 3, '0', STR_PAD_LEFT);

        $order = New Order();
        $order->order_number = $order_number;
        $order->user_id = Auth::id();
        $order->order_date = now();
        $order->notes = $note;
        $order->save();

        $cart = Auth::user()->cart;
        $details = [];

        foreach ($cart->items as $item) {
            $details[$item->id] = [
                'quantity' => $item->pivot->quantity,
                'price_each' => $item->price,
            ];
        }
        $order->details()->attach($details);

        $cart->clear();
    }

    public function getOrders()
    {
        $userService = new UserService();
        if (Auth::user()->can('perform-administrative')) {
            $users = $userService->getUserWithSameCompanies();
            $orders = Order::whereIn('user_id', $users->pluck('id'))->withCount('details')->get();
        } else {
            $orders = Auth::user()->orders()->withCount('details')->get();
        }
        return $orders;
    }
}
