# 📘 Transaction Processing System - Midterm Exam

## Description / Overview
A **Transaction Processing System (TPS)** is a computerized system designed to record, process, and manage routine business transactions efficiently and accurately. It handles essential data such as sales, payments, and orders, ensuring that every transaction is completed successfully and stored securely. TPS supports businesses by maintaining up-to-date records, improving operational efficiency, and enabling better decision-making through real-time data management.

---

## Author: Janial Bacani

---

## Objectives
The goal of this project is to develop a **Transaction Processing System (TPS)** that efficiently records, manages, and monitors business transactions. It aims to:
- Track products, sales, and transactions in real time.  
- Ensure accurate and organized data management.  
- Streamline business operations.  
- Provide insights into product inventory and sales performance.  

---

## Features / Functionality
- **Dashboard Overview**: Displays total products, total transactions, total sales, and low-stock items.  
- **Product Management**:  
  - View all available products with details (name, price, stock quantity).  
  - Add, edit, and update product information.  
- **Transaction Management**:  
  - Record transactions including buyer details, items, quantity, total, and date.  
  - Automatically updates product stock after each sale.  
- **Low Stock Alert**: Highlights products that need restocking.  
- **User-Friendly Interface**: Simple and intuitive layout for easy management.  

---

## Installation Instructions
Follow these steps to set up and run the **Transaction Processing System** built with **Laravel**:

1. **Install PHP and Composer**
   - Make sure PHP 8.0+ and Composer are installed.

2. **Install Dependencies**
   ```bash
   composer install

3. **Set Up Environment File**

    ```bash
    cp .env.example .env


* Configure your .env file (database, app name, etc.).

4. **Generate Application Key**

    ```bash
    php artisan key:generate


5. **Run Migrations (Create Database Tables)**

    ```bash
    php artisan migrate


6. **Run the Laravel Development Server**

   ```bash
   php artisan serve


* Access the system at http://127.0.0.1:8000

---

## Usage

1. Access the System via the provided URL.

2. View Products — Check all available items with their details.

3. Add a Product — Enter product name, price, and stock quantity.

4. Make a Transaction — Select items, specify quantity, confirm purchase.

5. View Transactions — Monitor buyer details, purchases, and total sales.

6. Check Low Stock — Identify and restock items nearing depletion.

---

## Code Snippets

## 1.Dashboard Controller
```bash
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

```

## 2.Product Controller
```bash
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
```

## 3.Transaction Controller
```bash 
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product', 'user')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        return DB::transaction(function () use ($request) {
            $product = Product::lockForUpdate()->find($request->product_id);

            if ($product->stock < $request->quantity) {
                return back()->with('error', 'Not enough stock.');
            }

            $total = $product->price * $request->quantity;
            $product->decrement('stock', $request->quantity);

            Transaction::create([
                'user_id' => null,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'total' => $total,
                'status' => 'completed',
            ]);

            return redirect()->route('transactions.index')->with('success', 'Purchase successful!');
        });
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }
}


