<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('package')
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|in:requested,approved,rejected',
        ]);

        $order->update($data);

        return back()->with('success', "Status pesanan {$order->order_code} berhasil diubah.");
    }
}
