@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Produk</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" width="100" class="d-block mb-2">
                @endif
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="capital_price" class="form-label">Harga Modal</label>
                <input type="number" class="form-control" id="capital_price" name="capital_price" value="{{ $product->capital_price }}" required>
            </div>
            <div class="mb-3">
                <label for="selling_price" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ $product->selling_price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection