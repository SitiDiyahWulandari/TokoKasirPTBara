@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<style>
    /* Kartu Utama */
    .product-form-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .product-form-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
    }
    
    .product-form-card .card-header h5 {
        font-weight: 600;
        margin: 0;
        font-size: 1.25rem;
    }
    
    /* Body Kartu */
    .product-form-card .card-body {
        padding: 2rem;
    }
    
    /* Form Input */
    .form-label {
        font-weight: 600;
        color: #5a5c69;
        margin-bottom: 0.5rem;
    }
    
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
    
    /* Tombol */
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #3a5bc7;
        border-color: #3a5bc7;
        transform: translateY(-1px);
    }
    
    /* Spacing Form */
    .mb-3 {
        margin-bottom: 1.5rem !important;
    }
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    /* Responsive Form */
    @media (max-width: 768px) {
        .product-form-card .card-body {
            padding: 1.5rem;
        }
    }
</style>

<div class="card product-form-card">
    <div class="card-header">
        <h5>Tambah Produk Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="capital_price" class="form-label">Harga Modal</label>
                <input type="number" class="form-control" id="capital_price" name="capital_price" required>
            </div>
            <div class="mb-3">
                <label for="selling_price" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="selling_price" name="selling_price" required>
            </div>
            
            <div class="action-buttons">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection