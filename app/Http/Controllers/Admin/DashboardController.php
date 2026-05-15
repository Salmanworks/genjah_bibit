<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products'    => Product::count(),
            'total_categories'  => Category::count(),
            'total_orders'      => Order::count(),
            'total_users'       => User::count(),
            'recent_orders'     => Order::latest()->take(5)->get(),
            'low_stock_products' => Product::where('stock', '<', 10)->take(5)->get(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
