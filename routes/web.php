<?php

use App\Http\Controllers\{
    CategoryController, 
    CustomerController,
    DashboardController, 
    ProductController,
    StockInController,
    StockOutController,
    UserController,
    SupplierController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Untuk Admin saja
    Route::middleware('role:admin')->group(function () {
        Route::resource('/users', UserController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/suppliers', SupplierController::class);
        Route::resource('/customers', CustomerController::class);
        Route::resource('/products', ProductController::class);
        Route::get('/stocks', [ProductController::class, 'stocks'])->name('stocks');
        Route::post('/stocks/import', [ProductController::class, 'import'])->name('stocks.import');
        Route::get('/stocks/export-pdf', [ProductController::class, 'exportPdf'])->name('stocks.exportPdf');
    });

    // Akses umum untuk semua (admin & kasir)
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Untuk Admin dan Kasir
    Route::middleware('role:admin,kasir')->group(function () {
        Route::get('/stock-ins', [StockInController::class, 'index'])->name('stock_ins.index');
        Route::get('/stock-ins/create', [StockInController::class, 'create'])->name('stock_ins.create');
        Route::post('/stock-ins', [StockInController::class, 'store'])->name('stock_ins.store');
        Route::get('/stock-ins/{id}', [StockInController::class, 'show'])->name('stock_ins.show');
        Route::get('/stock-ins/{id}/invoice', [StockInController::class, 'downloadPDF'])->name('stock_ins.invoice');

        Route::get('/stock-outs', [StockOutController::class, 'index'])->name('stock_outs.index');
        Route::get('/stock-outs/create', [StockOutController::class, 'create'])->name('stock_outs.create');
        Route::post('/stock-outs', [StockOutController::class, 'store'])->name('stock_outs.store');
        Route::get('/stock-outs/{id}', [StockOutController::class, 'show'])->name('stock_outs.show');
        Route::get('/stock-outs/{id}/invoice', [StockOutController::class, 'downloadPDF'])->name('stock_outs.invoice');
    });
});

require __DIR__.'/auth.php';
