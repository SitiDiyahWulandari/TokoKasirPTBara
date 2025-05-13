@extends('layouts.app')

@section('title', 'Buat Penjualan Baru')

@section('content')
<style>
    /* Kartu Utama */
    .sale-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    /* Header Kartu */
    .sale-card .card-header {
        background-color: #4e73df;
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
    }
    
    .sale-card .card-header h5 {
        font-weight: 600;
        margin: 0;
        font-size: 1.25rem;
    }
    
    /* Body Kartu */
    .sale-card .card-body {
        padding: 2rem;
    }
    
    /* Section Header */
    .section-header {
        font-weight: 600;
        color: #5a5c69;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #e3e6f0;
    }
    
    /* Spacing Section */
    .section-spacing {
        margin-bottom: 2rem;
    }
    
    /* Form Control */
    .form-control, .form-select {
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
        height: calc(2.875rem + 2px);
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    /* Tombol Tambah Produk */
    .btn-add-product {
        background-color: #4e73df;
        border-color: #4e73df;
        font-weight: 500;
        padding: 0.65rem 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        height: calc(2.875rem + 2px);
        width: 100%;
    }
    
    .btn-add-product:hover {
        background-color: #3a5bc7;
        border-color: #3a5bc7;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(58, 91, 199, 0.2);
    }
    
    .btn-add-product i {
        font-size: 0.9rem;
    }
    
    /* Tombol Simpan Transaksi */
    .btn-save-transaction {
        background-color: #1cc88a;
        border-color: #1cc88a;
        font-weight: 500;
        padding: 0.75rem 2rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        min-width: 180px;
        font-size: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .btn-save-transaction:hover {
        background-color: #17a673;
        border-color: #17a673;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(28, 200, 138, 0.2);
    }
    
    .btn-save-transaction i {
        font-size: 1rem;
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
    
    /* Input Kuantitas */
    .quantity-input {
        width: 70px !important;
        text-align: center;
        font-weight: 600;
    }
    
    /* Format Harga */
    .price-format {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }
    
    /* Form Control Plaintext */
    .form-control-plaintext {
        font-family: 'Courier New', monospace;
        font-weight: 600;
        color: #5a5c69;
        padding: 0.75rem 0;
    }
    
    /* Tombol Hapus */
    .btn-danger {
        background-color: #e74a3b;
        border-color: #e74a3b;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-danger:hover {
        background-color: #be2617;
        border-color: #be2617;
    }
    
    /* Responsive Table */
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
        margin-top: 1.5rem;
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
    
    /* Spacing tambahan */
    .form-spacing {
        margin-top: 2rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .btn-add-product {
            height: auto;
            padding: 0.5rem 1rem;
        }
        .form-select {
            height: auto;
        }
    }
</style>

<div class="card sale-card">
    <div class="card-header">
        <h5>Buat Penjualan Baru</h5>
    </div>
    <div class="card-body">
        <!-- Section Pilih Produk -->
        <div class="section-spacing">
            <h6 class="section-header">Pilih Produk</h6>
            <div class="row align-items-center g-3">
                <div class="col-md-8 col-lg-9">
                    <select id="productSelect" class="form-select">
                        <option value="">-- Pilih Produk --</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" 
                            data-name="{{ $product->name }}" 
                            data-price="{{ $product->selling_price }}">
                            {{ $product->name }} (Rp {{ number_format($product->selling_price, 0, ',', '.') }})
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-lg-3">
                    <button type="button" id="addProductBtn" class="btn btn-add-product">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Section Daftar Pembelian -->
        <div class="form-spacing">
            <h6 class="section-header">Daftar Pembelian</h6>
            <form id="saleForm" action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="productTable">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Produk akan ditambahkan di sini via JavaScript -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total:</th>
                                <th id="totalAmount" class="price-format">Rp 0</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="money_received" class="form-label">Uang Diterima</label>
                            <input type="number" class="form-control price-format" id="money_received" name="money_received" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Kembalian</label>
                            <div id="changeAmount" class="form-control-plaintext price-format">Rp 0</div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-save-transaction">
                        <i class="fas fa-check-circle"></i> Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('productSelect');
    const addProductBtn = document.getElementById('addProductBtn');
    const productTable = document.getElementById('productTable').getElementsByTagName('tbody')[0];
    const totalAmount = document.getElementById('totalAmount');
    const moneyReceived = document.getElementById('money_received');
    const changeAmount = document.getElementById('changeAmount');
    const saleForm = document.getElementById('saleForm');
    
    let products = [];
    let total = 0;
    
    addProductBtn.addEventListener('click', function() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const productId = productSelect.value;
        
        if (!productId) {
            alert('Silakan pilih produk terlebih dahulu');
            return;
        }
        
        const productName = selectedOption.getAttribute('data-name');
        const productPrice = parseInt(selectedOption.getAttribute('data-price'));
        
        const existingProduct = products.find(p => p.id == productId);
        
        if (existingProduct) {
            existingProduct.quantity += 1;
            existingProduct.subtotal = existingProduct.quantity * productPrice;
        } else {
            products.push({
                id: productId,
                name: productName,
                price: productPrice,
                quantity: 1,
                subtotal: productPrice
            });
        }
        
        updateProductTable();
        productSelect.value = '';
    });
    
    function updateProductTable() {
        productTable.innerHTML = '';
        total = 0;
        
        products.forEach((product, index) => {
            total += product.subtotal;
            
            const row = productTable.insertRow();
            
            row.innerHTML = `
                <td>${product.name}</td>
                <td class="price-format">Rp ${product.price.toLocaleString('id-ID')}</td>
                <td>
                    <input type="number" min="1" value="${product.quantity}" 
                           class="form-control quantity-input" 
                           data-index="${index}">
                </td>
                <td class="price-format">Rp ${product.subtotal.toLocaleString('id-ID')}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-product" data-index="${index}">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </td>
            `;
        });
        
        totalAmount.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        updateChange();
    }
    
    productTable.addEventListener('input', function(e) {
        if (e.target.classList.contains('quantity-input')) {
            const index = e.target.getAttribute('data-index');
            const newQuantity = parseInt(e.target.value);
            
            if (newQuantity > 0) {
                products[index].quantity = newQuantity;
                products[index].subtotal = newQuantity * products[index].price;
                updateProductTable();
            } else {
                e.target.value = products[index].quantity;
            }
        }
    });
    
    productTable.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product') || 
            e.target.closest('.remove-product')) {
            const button = e.target.classList.contains('remove-product') ? 
                          e.target : e.target.closest('.remove-product');
            const index = button.getAttribute('data-index');
            products.splice(index, 1);
            updateProductTable();
        }
    });
    
    moneyReceived.addEventListener('input', updateChange);
    
    function updateChange() {
        const received = parseFloat(moneyReceived.value) || 0;
        const change = received - total;
        
        changeAmount.textContent = `Rp ${Math.max(0, change).toLocaleString('id-ID')}`;
        
        // Ubah warna jika uang kurang
        if (change < 0) {
            changeAmount.style.color = '#e74a3b';
        } else {
            changeAmount.style.color = '#1cc88a';
        }
    }
    
    saleForm.addEventListener('submit', function(e) {
        if (products.length === 0) {
            e.preventDefault();
            alert('Tambahkan minimal satu produk');
            return;
        }
        
        if (parseFloat(moneyReceived.value) < total) {
            e.preventDefault();
            alert('Uang yang diterima kurang dari total pembelian');
            return;
        }
        
        // Tambahkan input hidden untuk setiap produk
        products.forEach((product, index) => {
            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = `products[${index}][id]`;
            idInput.value = product.id;
            saleForm.appendChild(idInput);
            
            const qtyInput = document.createElement('input');
            qtyInput.type = 'hidden';
            qtyInput.name = `products[${index}][quantity]`;
            qtyInput.value = product.quantity;
            saleForm.appendChild(qtyInput);
        });
    });
});
</script>
@endpush
@endsection