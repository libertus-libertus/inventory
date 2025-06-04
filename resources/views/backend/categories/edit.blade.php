@extends('layouts.app')

@section('title', 'Edit Kategori: ' . $category->category_name)

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Edit Kategori</h1>
        <p class="text-gray-600">Formulir untuk memperbarui informasi kategori produk.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Kategori</h3>
        </div>

        {{-- Form Edit Kategori --}}
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting: Gunakan metode PUT/PATCH untuk update --}}

            <div class="mb-4">
                <label for="category_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="category_name" id="category_name"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm
                              @error('category_name') border-red-500 @enderror"
                       value="{{ old('category_name', $category->category_name) }}" required>
                @error('category_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm
                                 @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-save mr-2"></i> Perbarui Kategori
                </button>
            </div>
        </form>
    </div>
@endsection