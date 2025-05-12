<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash; // <-- Tambahkan baris ini
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'shop_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Aturan validasi
    public static $rules = [
        'name' => 'required|string|max:255',
        'shop_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ];

    // Enkripsi password otomatis
    /*
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
        */

    // Relasi
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}