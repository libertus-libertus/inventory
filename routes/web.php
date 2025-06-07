<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/suppliers', SupplierController::class);

    # Kelola stok produk
    Route::resource('/products', ProductController::class);
    Route::get('/stocks', [ProductController::class, 'stocks'])->name('stocks');
    Route::post('/stocks/import', [ProductController::class, 'import'])->name('stocks.import');
    Route::get('/stocks/export-pdf', [ProductController::class, 'exportPdf'])->name('stocks.exportPdf');

    Route::resource('/users', UserController::class);
    
    # barang masuk
    Route::get('/stock-ins', [StockInController::class, 'index'])->name('stock_ins.index');
    Route::get('/stock-ins/create', [StockInController::class, 'create'])->name('stock_ins.create');
    Route::post('/stock-ins', [StockInController::class, 'store'])->name('stock_ins.store');
    Route::get('/stock-ins/{id}', [StockInController::class, 'show'])->name('stock_ins.show');
    Route::get('/stock-ins/{id}/invoice', [StockInController::class, 'downloadPDF'])->name('stock_ins.invoice');

    # barang keluar
    Route::get('/stock-outs', [StockOutController::class, 'index'])->name('stock_outs.index');
    Route::get('/stock-outs/create', [StockOutController::class, 'create'])->name('stock_outs.create');
    Route::post('/stock-outs', [StockOutController::class, 'store'])->name('stock_outs.store');
    Route::get('/stock-outs/{id}', [StockOutController::class, 'show'])->name('stock_outs.show');
    Route::get('/stock-outs/{id}/invoice', [StockOutController::class, 'downloadPDF'])->name('stock_outs.invoice');
    
});

require __DIR__.'/auth.php';
