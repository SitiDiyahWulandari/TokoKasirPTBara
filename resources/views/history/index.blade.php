@extends('layouts.app')

@section('title', 'Riwayat Penjualan')

@section('content')
<style>
    /* Kartu Utama */
    .history-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .history-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .history-card .card-header h2 {
        font-weight: 600;
        margin: 0;
        font-size: 1.5rem;
    }
    
    /* Tabel Responsif */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }
    
    /* Gaya Tabel */
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
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
    
    /* Tombol */
    .btn-info {
        background-color: #36b9cc;
        border-color: #36b9cc;
        color: white;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-info:hover {
        background-color: #2c9faf;
        border-color: #2a96a5;
        color: white;
        transform: translateY(-1px);
    }
    
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.35rem;
        font-weight: 500;
    }
    
    /* Format Teks Khusus */
    .price {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    .date {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #5a5c69;
    }
    
    .transaction-id {
        font-weight: 600;
        color: #4e73df;
    }
    
    /* Border Radius untuk Tabel */
    .table-bordered {
        border: 1px solid #e3e6f0;
    }
    
    .table-bordered thead th:first-child {
        border-top-left-radius: 8px;
    }
    
    .table-bordered thead th:last-child {
        border-top-right-radius: 8px;
    }
    
    .table-bordered tbody tr:last-child td:first-child {
        border-bottom-left-radius: 8px;
    }
    
    .table-bordered tbody tr:last-child td:last-child {
        border-bottom-right-radius: 8px;
    }
</style>

<div class="card history-card">
    <div class="card-header">
        <h2>Riwayat Penjualan</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal</th>
                        <th>Total Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td class="transaction-id">{{ $sale->id }}</td>
                        <td class="date">{{ $sale->created_at->format('d M Y H:i') }}</td>
                        <td class="price">Rp {{ number_format($sale->total, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('history.show', $sale->id) }}" class="btn btn-info btn-sm">
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