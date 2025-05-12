@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="card">
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
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection