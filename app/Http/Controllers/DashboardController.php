<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalSales = Transaction::sum('total');
        $lowStock = Product::where('stock', '<=', 5)->count();

        return view('dashboard', compact(
            'totalProducts',
            'totalTransactions',
            'totalSales',
            'lowStock'
        ));
    }
}
