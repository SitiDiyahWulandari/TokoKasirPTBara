@extends('layouts.app')

@section('title', 'Detail Riwayat Penjualan')

@section('content')
<style>
    /* Kartu Utama */
    .history-detail-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .history-detail-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
    }
    
    .history-detail-card .card-header h5 {
        font-weight: 600;
        margin: 0;
        font-size: 1.25rem;
    }
    
    /* Body Kartu */
    .history-detail-card .card-body {
        padding: 2rem;
    }
    
    /* Info Transaksi */
    .transaction-info {
        background-color: #f8f9fc;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .transaction-info h6 {
        font-weight: 600;
        color: #4e73df;
        margin-bottom: 0.5rem;
    }
    
    .transaction-info p {
        color: #5a5c69;
        margin-bottom: 0;
    }
    
    /* Tabel */
    .table {
        margin-bottom: 1.5rem;
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
    
    .table tfoot th {
        font-weight: 600;
        background-color: #f8f9fc;
    }
    
    /* Warna Baris Bergantian */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(78, 115, 223, 0.05);
    }
    
    /* Format Harga */
    .price-format {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    /* Responsive Table */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e3e6f0;
    }
    
    /* Border Radius untuk Tabel */
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
    
    /* Tombol */
    .btn-secondary {
        background-color: #858796;
        border-color: #858796;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
        background-color: #717384;
        border-color: #6b6d7d;
        transform: translateY(-1px);
    }
    
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
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
</style>

<div class="card history-detail-card">
    <div class="card-header">
        <h5>Detail Riwayat Transaksi</h5>
    </div>
    <div class="card-body">
        <div class="transaction-info">
            <h6>Kode Transaksi: {{ $sale->transaction_code }}</h6>
            <p>Tanggal: {{ $sale->created_at->format('d/m/Y H:i') }}</p>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
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
                        <td class="price-format">Rp {{ number_format($item->product->selling_price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td class="price-format">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total:</th>
                        <th class="price-format">Rp {{ number_format($sale->total, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-end">Uang Diterima:</th>
                        <th class="price-format">Rp {{ number_format($sale->money_received, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-end">Kembalian:</th>
                        <th class="price-format">Rp {{ number_format($sale->change, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="action-buttons">
            <a href="{{ route('history.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Riwayat
            </a>
        </div>
    </div>
</div>
@endsection