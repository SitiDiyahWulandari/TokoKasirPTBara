<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| Debug Routes (Opsional)
|--------------------------------------------------------------------------
*/
Route::get('/test-view', function () {
    if (view()->exists('auth.layouts.app')) {
        return view('auth.layouts.app');
    }

    return response()->json([
        'error' => 'View not found',
        'searched_path' => resource_path('views/auth/layouts/app.blade.php'),
        'view_exists' => view()->exists('auth.layouts.app'),
        'suggestion' => 'Pastikan file ada di resources/views/auth/layouts/app.blade.php'
    ], 404);
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration Routes
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Logout Routes (both GET and POST for flexibility)
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout.get');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ini route home nya
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /*
    |--------------------------------------------------------------------------
    | Product Management
    |--------------------------------------------------------------------------
    */
    Route::resource('products', ProductController::class)->except(['show']); // Jika tidak membutuhkan show

    /*
    |--------------------------------------------------------------------------
    | Sales Management
    |--------------------------------------------------------------------------
    */
    Route::resource('sales', SaleController::class);
    Route::get('sales/{sale}/print', [SaleController::class, 'print'])->name('sales.print');

    /*
    |--------------------------------------------------------------------------
    | Transaction History
    |--------------------------------------------------------------------------
    */
    Route::prefix('history')->group(function () {
        Route::get('/', [HistoryController::class, 'index'])->name('history.index');
        Route::get('/{sale}', [HistoryController::class, 'show'])->name('history.show');
    });
});
