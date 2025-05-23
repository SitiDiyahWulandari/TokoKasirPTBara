<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
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
            'capital_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gambar_products', 'public');
            $data['image'] = $imagePath;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'name' => 'required',
            'capital_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('gambar_products', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
