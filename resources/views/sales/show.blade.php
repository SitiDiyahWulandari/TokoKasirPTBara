@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Transaksi</h5>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <h6>Kode Transaksi: {{ $sale->transaction_code }}</h6>
            <p>Tanggal: {{ $sale->created_at->format('d/m/Y H:i') }}</p>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale->saleDetails as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp {{ number_format($item->product->selling_price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total:</th>
                        <th>Rp {{ number_format($sale->total, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-end">Uang Diterima:</th>
                        <th>Rp {{ number_format($sale->money_received, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-end">Kembalian:</th>
                        <th>Rp {{ number_format($sale->change, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="mt-3">
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali</a>
            <button onclick="window.print()" class="btn btn-primary">Cetak Struk</button>
        </div>
    </div>
</div>
@endsection