<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::where('user_id', Auth::id())->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|numeric|min:1',
            'money_received' => 'required|numeric|min:0',
        ]);

        // Calculate total
        $total = 0;
        $productsData = [];
        
        foreach ($request->products as $productData) {
            $product = Product::find($productData['id']);
            $subtotal = $product->selling_price * $productData['quantity'];
            
            $productsData[] = [
                'product_id' => $product->id,
                'quantity' => $productData['quantity'],
                'subtotal' => $subtotal,
            ];
            
            $total += $subtotal;
        }

        // Check if money received is enough
        if ($request->money_received < $total) {
            return back()->with('error', 'Uang yang diterima kurang dari total pembelian');
        }

        // Create sale
        $sale = Sale::create([
            'transaction_code' => 'TRX-' . now()->format('YmdHis') . '-' . Str::random(6),
            'user_id' => Auth::id(),
            'total' => $total,
            'money_received' => $request->money_received,
            'change' => $request->money_received - $total,
        ]);

        // Create sale details
        foreach ($productsData as $productData) {
            $productData['sale_id'] = $sale->id;
            SaleDetail::create($productData);
        }

        return redirect()->route('sales.show', $sale)->with('success', 'Transaksi berhasil disimpan');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function print(Sale $sale)
    {
        return view('sales.print', compact('sale'));
    }
}
