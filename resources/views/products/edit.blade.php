@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<style>
    /* Kartu Utama */
    .edit-product-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .edit-product-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
    }
    
    .edit-product-card .card-header h5 {
        font-weight: 600;
        margin: 0;
        font-size: 1.25rem;
    }
    
    /* Body Kartu */
    .edit-product-card .card-body {
        padding: 2rem;
    }
    
    /* Form Group */
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    /* Label Form */
    .form-label {
        font-weight: 600;
        color: #5a5c69;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    /* Input Control */
    .form-control {
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    /* Gambar Produk */
    .product-image-preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
        border: 1px solid #e3e6f0;
    }
    
    /* Tombol */
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #3a5bc7;
        border-color: #3a5bc7;
        transform: translateY(-1px);
    }
    
    /* Input Number */
    input[type="number"] {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    /* File Input */
    .form-control-file {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
    }
</style>

<div class="card edit-product-card">
    <div class="card-header">
        <h5>Edit Produk</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="image" class="form-label">Gambar Produk</label>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="product-image-preview">
                @endif
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            
            <div class="form-group">
                <label for="capital_price" class="form-label">Harga Modal</label>
                <input type="number" class="form-control" id="capital_price" name="capital_price" 
                       value="{{ $product->capital_price }}" required>
            </div>
            
            <div class="form-group">
                <label for="selling_price" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="selling_price" name="selling_price" 
                       value="{{ $product->selling_price }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Produk
            </button>
        </form>
    </div>
</div>
@endsection