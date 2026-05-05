<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rate;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'totalOrders' => Order::count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'paidOrders' => Order::where('status', 'paid')->count(),
            'activeRates' => Rate::where('is_active', true)->count(),
            'latestOrders' => Order::latest()->limit(10)->get(),
        ]);
    }
}
