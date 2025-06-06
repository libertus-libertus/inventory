@extends('layouts.app')

@section('title', 'Detail Produk: ' . $product->name)

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Detail Produk</h1>
        <p class="text-gray-600">Informasi lengkap mengenai produk.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Produk</h3>
            <div class="flex space-x-2">
                <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDeleteProduct({{ $product->id }}, '{{ $product->name }}')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm font-medium text-gray-500">SKU (Kode Produk):</p>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $product->sku }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Nama Produk:</p>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $product->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Kategori:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->category->name ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Unit:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->unit ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Jumlah Stok:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->quantity }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Status:</p>
                <p class="mt-1 text-base text-gray-800 capitalize">{{ $product->status }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Pemasok:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->supplier->name ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Dibuat Pada:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Terakhir Diperbarui:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->updated_at->format('d M Y') }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500">Deskripsi:</p>
                <p class="mt-1 text-base text-gray-800">{{ $product->description ?: 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
            <a href="{{ route('products.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Produk
            </a>
        </div>
    </div>
@endsection

@push('js')
<script>
    function confirmDeleteProduct(productId, productName) {
        Swal.fire({
            title: 'Yakin mau hapus produk ini?',
            html: `Produk <strong>"${productName}"</strong> akan dihapus permanen.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }
</script>
@endpush
