@extends('layouts.app')

@section('title', 'Detail Barang Masuk')

@section('content')
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Barang Masuk</h1>
            <p class="text-gray-600">Informasi lengkap transaksi barang masuk dari supplier.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('stock_ins.invoice', $stockIn->id) }}"
            class="inline-flex items-center px-4 py-2 text-sm text-white bg-indigo-600 rounded hover:bg-indigo-700 shadow">
                <i class="fas fa-file-pdf mr-2"></i> Invoice PDF
            </a>
            <a href="{{ route('stock_ins.index') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Transaksi
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500">Kode Referensi</p>
                <p class="text-lg font-medium text-gray-900">{{ $stockIn->reference_code }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Tanggal Transaksi</p>
                <p class="text-lg font-medium text-gray-900">{{ \Carbon\Carbon::parse($stockIn->stock_in_date)->format('d M Y') }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Nama Produk</p>
                <p class="text-lg font-medium text-gray-900">{{ $stockIn->product->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Jumlah Masuk</p>
                <p class="text-lg font-medium text-gray-900">{{ $stockIn->quantity }} {{ $stockIn->product->unit }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Supplier</p>
                <p class="text-lg font-medium text-gray-900">{{ $stockIn->supplier->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Dibuat Oleh</p>
                <p class="text-lg font-medium text-gray-900">{{ $stockIn->user->name }}</p>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-gray-500">Catatan</p>
                <p class="text-lg font-medium text-gray-900">{{ $stockIn->notes ?: '-' }}</p>
            </div>
        </div>
    </div>
@endsection
