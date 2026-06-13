<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('stock-movements', StockMovementController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('dashboard', DashboardController::class);
});

// Route::middleware(['auth'])->group(function () {

//     Route::get('/products', [ProductController::class, 'index']);
//     Route::get('/products/create', [ProductController::class, 'create']);
//     Route::post('/products', [ProductController::class, 'store']);
//     Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
//     Route::put('/products/{product}', [ProductController::class, 'update']);
//     Route::delete('/products/{product}', [ProductController::class, 'destroy']);

// });

require __DIR__.'/auth.php';
