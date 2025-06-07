@extends('layouts.app')

@section('title', 'Tambah Barang Masuk')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tambah Barang Masuk</h1>
        <p class="text-gray-600">Formulir untuk mencatat transaksi barang masuk dari supplier.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Transaksi</h3>
        </div>

        <form action="{{ route('stock_ins.store') }}" method="POST">
            @csrf

            @php
                $selectedProduct = isset($products) && request('product_id')
                    ? $products->where('id', request('product_id'))->first()
                    : null;
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kode Referensi --}}
                <div>
                    <label for="reference_code" class="block text-sm font-medium text-gray-700 mb-1">Kode Referensi</label>
                    <input type="text" name="reference_code" id="reference_code" readonly
                        class="mt-1 block w-full px-3 py-2 bg-gray-100 border rounded-md shadow-sm sm:text-sm"
                        value="{{ $referenceCode }}">
                </div>

                {{-- Tanggal Transaksi --}}
                <div>
                    <label for="stock_in_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Transaksi <span class="text-red-500">*</span></label>
                    <input type="date" name="stock_in_date" id="stock_in_date" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm sm:text-sm @error('stock_in_date') border-red-500 @enderror"
                        value="{{ old('stock_in_date', date('Y-m-d')) }}">
                    @error('stock_in_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Produk --}}
                <div>
                    <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Produk <span class="text-red-500">*</span></label>
                    @if($selectedProduct)
                        <input type="hidden" name="product_id" value="{{ $selectedProduct->id }}">
                        <input type="text" readonly class="block w-full px-3 py-2 bg-gray-100 border rounded-md shadow-sm sm:text-sm"
                            value="{{ $selectedProduct->name }} ({{ $selectedProduct->sku }})">
                    @else
                        <select name="product_id" id="product_id" required
                            class="mt-1 block w-full px-3 py-2 border bg-white rounded-md shadow-sm sm:text-sm @error('product_id') border-red-500 @enderror">
                            <option value="">-- Pilih Produk --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} ({{ $product->sku }})
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @error('product_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Supplier --}}
                <div>
                    <label for="supplier_id" class="block text-sm font-medium text-gray-700 mb-1">Supplier <span class="text-red-500">*</span></label>
                    <select name="supplier_id" id="supplier_id" required
                        class="mt-1 block w-full px-3 py-2 border bg-white rounded-md shadow-sm sm:text-sm @error('supplier_id') border-red-500 @enderror">
                        <option value="">-- Pilih Supplier --</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jumlah --}}
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Barang <span class="text-red-500">*</span></label>
                    <input type="number" name="quantity" id="quantity" min="1" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm sm:text-sm @error('quantity') border-red-500 @enderror"
                        value="{{ old('quantity') }}">
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Catatan (1 kolom penuh) --}}
            <div class="mt-6">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea name="notes" id="notes" rows="3"
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm sm:text-sm @error('notes') border-red-500 @enderror">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-end space-x-3 mt-6">
                <a href="{{ route('stock_ins.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                    <i class="fas fa-save mr-2"></i> Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
@endsection
