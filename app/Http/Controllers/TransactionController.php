<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product','user')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:1'
        ]);

        return DB::transaction(function () use ($request) {
            $product = Product::lockForUpdate()->find($request->product_id);

            if ($product->stock < $request->quantity) {
                return back()->with('error','Not enough stock.');
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

            return redirect()->route('transactions.index')->with('success','Purchase successful!');
        });
    }
}
