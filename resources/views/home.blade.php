@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard Utama')

@section('breadcrumbs')
    <li aria-current="page">
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Dashboard</span>
        </div>
    </li>
@endsection

@section('content')
    <!-- Konten Anda di sini -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-primary-500">
            <h3 class="text-lg font-medium text-gray-500">Total Produk</h3>
            <p class="text-3xl font-bold mt-2">125</p>
        </div>
    </div>
@endsection