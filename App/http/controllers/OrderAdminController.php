<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::latest()->paginate(20),
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,waiting_pulse,processing,paid,rejected'],
        ]);

        $order->update($data);

        return back()->with('success', 'Status order diperbarui.');
    }
}
