<?php

namespace App\Http\Controllers\Order;

use Alert;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(OrderService $orderService)
    {
        $this->authorize('viewAny', Order::class);
        $orders = $orderService->getOrders();

        return view('order.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $order = $order->load('details', 'status');

        $data = [
            'order' => $order,
        ];
        return view('order.order.show', $data);
    }

    public function showConfirmation()
    {
        $this->authorize('viewAny', Order::class);
        $cart = Auth::user()->cart->load('items');

        $data = [
            'cart' => $cart,
        ];
        return view('order.order.confirmation', $data);
    }

    public function storeCartToOrder(Request $request, OrderService $orderService)
    {
        $this->authorize('viewAny', Order::class);
        $orderService->handleStoreFromCart($request->note);

        Alert::success('Order Created', 'Your order has been successfully created');
        return redirect()->route('order.cart.index');
    }
}
