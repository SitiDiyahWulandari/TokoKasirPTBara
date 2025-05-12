@extends('auth.layouts.app')

@section('title', 'Login')
@section('auth-title', 'Masuk ke Akun Anda')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
               name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Ingat Saya</label>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-toko text-white py-2">
            Login
        </button>
        
        @if (Route::has('password.request'))
        <a class="btn btn-link text-decoration-none text-center" href="{{ route('password.request') }}">
            Lupa Password?
        </a>
        @endif
    </div>

    <hr class="my-4">

    <div class="text-center">
        Belum punya akun? 
        <a href="{{ route('register') }}" class="text-decoration-none">Daftar Sekarang</a>
    </div>
</form>
@endsection
