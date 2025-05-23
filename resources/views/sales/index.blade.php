@extends('layouts.app')

@section('title', 'Riwayat Penjualan')

@section('content')
<style>
    /* Kartu Utama */
    .sales-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .sales-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .sales-card .card-header h5 {
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
    
    /* Tombol Info */
    .btn-info {
        background-color: #36b9cc;
        border-color: #36b9cc;
        color: white;
    }
    
    .btn-info:hover {
        background-color: #2c9faf;
        border-color: #2a96a5;
        color: white;
    }
    
    /* Format Harga */
    .price {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    /* Format Tanggal */
    .date {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #5a5c69;
    }
    
    /* Kode Transaksi */
    .transaction-code {
        font-weight: 600;
        color: #4e73df;
    }
</style>

<div class="card sales-card">
    <div class="card-header">
        <h5>Riwayat Penjualan</h5>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">
            <i class="fas fa-cash-register"></i> Buat Transaksi
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="transaction-code">{{ $sale->transaction_code }}</td>
                        <td class="date">{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                        <td class="price">Rp {{ number_format($sale->total, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection