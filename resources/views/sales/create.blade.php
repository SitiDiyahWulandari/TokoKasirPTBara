@extends('layouts.app')

@section('title', 'Buat Penjualan Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Buat Penjualan Baru</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <h6>Pilih Produk</h6>
                    <div class="input-group mb-3">
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
                        <button type="button" id="addProductBtn" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-4">
            <h6>Daftar Pembelian</h6>
            <form id="saleForm" action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered" id="productTable">
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
                                <th id="totalAmount">Rp 0</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="money_received" class="form-label">Uang Diterima</label>
                            <input type="number" class="form-control" id="money_received" name="money_received" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Kembalian</label>
                            <div id="changeAmount" class="form-control-plaintext">Rp 0</div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
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
        
        if (!productId) return;
        
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
                <td>Rp ${product.price.toLocaleString('id-ID')}</td>
                <td>
                    <input type="number" min="1" value="${product.quantity}" 
                           class="form-control quantity-input" 
                           data-index="${index}" 
                           style="width: 70px;">
                </td>
                <td>Rp ${product.subtotal.toLocaleString('id-ID')}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-product" data-index="${index}">
                        Hapus
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
            }
        }
    });
    
    productTable.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product')) {
            const index = e.target.getAttribute('data-index');
            products.splice(index, 1);
            updateProductTable();
        }
    });
    
    moneyReceived.addEventListener('input', updateChange);
    
    function updateChange() {
        const received = parseFloat(moneyReceived.value) || 0;
        const change = received - total;
        
        changeAmount.textContent = `Rp ${Math.max(0, change).toLocaleString('id-ID')}`;
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