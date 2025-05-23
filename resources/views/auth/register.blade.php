@extends('auth.layouts.app')

@section('title', 'Daftar Akun')
@section('auth-title', 'Buat Akun Baru')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="shop_name" class="form-label">Nama Toko</label>
        <input id="shop_name" type="text" class="form-control @error('shop_name') is-invalid @enderror" 
               name="shop_name" value="{{ old('shop_name') }}" required>
        @error('shop_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
               name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
               name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
        <input id="password-confirm" type="password" class="form-control" 
               name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-toko text-white py-2">
            Daftar
        </button>
    </div>

    <hr class="my-4">

    <div class="text-center">
        Sudah punya akun? 
        <a href="{{ route('login') }}" class="text-decoration-none">Login Sekarang</a>
    </div>
</form>
@endsection