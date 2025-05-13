@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<style>
    /* Kartu Utama */
    .product-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .product-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
    }
    
    .product-card .card-header h5 {
        font-weight: 600;
        margin: 0;
        font-size: 1.25rem;
    }
    
    /* Tombol */
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #3a5bc7;
        border-color: #3a5bc7;
        transform: translateY(-1px);
    }
    
    /* Tabel Responsif */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }
    
    /* Gaya Tabel */
    .table {
        margin-bottom: 0;
    }
    
    .table thead th {
        background-color: #f8f9fc;
        color: #5a5c69;
        font-weight: 600;
        border-bottom: 2px solid #e3e6f0;
        padding: 1rem;
    }
    
    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-top: 1px solid #e3e6f0;
    }
    
    /* Warna Baris Bergantian */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(78, 115, 223, 0.05);
    }
    
    /* Efek Hover */
    .table-striped tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.1);
    }
    
    /* Tombol Kecil */
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.35rem;
        font-weight: 500;
    }
    
    /* Tombol Edit */
    .btn-warning {
        background-color: #f6c23e;
        border-color: #f6c23e;
        color: #1f1d1d;
    }
    
    .btn-warning:hover {
        background-color: #dda20a;
        border-color: #dda20a;
        color: #1f1d1d;
    }
    
    /* Tombol Hapus */
    .btn-danger {
        background-color: #e74a3b;
        border-color: #e74a3b;
    }
    
    .btn-danger:hover {
        background-color: #be2617;
        border-color: #be2617;
    }
    
    /* Gambar Produk */
    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    /* Placeholder Gambar */
    .no-image {
        display: inline-block;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        background-color: #f8f9fc;
        border-radius: 4px;
        color: #858796;
    }
    
    /* Format Harga */
    .price {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    /* Container Tombol Aksi */
    .action-buttons {
        display: flex;
        gap: 0.5rem; /* Jarak antara tombol */
    }
    
    /* Jarak tambahan untuk form delete */
    .delete-form {
        margin: 0; /* Reset margin default form */
    }
</style>

<div class="card product-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar Produk</h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga Modal</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="product-image" alt="{{ $product->name }}">
                            @else
                                <span class="no-image">No image</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td class="price">Rp {{ number_format($product->capital_price, 0, ',', '.') }}</td>
                        <td class="price">Rp {{ number_format($product->selling_price, 0, ',', '.') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection