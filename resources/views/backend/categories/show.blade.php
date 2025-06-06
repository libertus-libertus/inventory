@extends('layouts.app')

@section('title', 'Detail Kategori: ' . $category->name) {{-- Menggunakan $category->name --}}

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Detail Kategori</h1>
        <p class="text-gray-600">Informasi lengkap mengenai kategori produk.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Kategori</h3>
            <div class="flex space-x-2">
                <a href="{{ route('categories.edit', $category->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                {{-- Mengubah onsubmit untuk SweetAlert2 --}}
                <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $category->id }}, '{{ $category->name }}')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm font-medium text-gray-500">Nama Kategori:</p>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $category->name }}</p> {{-- Menggunakan $category->name --}}
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Deskripsi:</p>
                <p class="mt-1 text-base text-gray-800">{{ $category->description ?: 'Tidak ada deskripsi.' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Dibuat Pada:</p>
                <p class="mt-1 text-base text-gray-800">{{ $category->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Terakhir Diperbarui:</p>
                <p class="mt-1 text-base text-gray-800">{{ $category->updated_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
            <a href="{{ route('categories.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Kategori
            </a>
        </div>
    </div>
@endsection

@push('js')
<script>
    // Fungsi untuk menampilkan SweetAlert2 konfirmasi hapus (diletakkan di sini agar tersedia di halaman ini)
    function confirmDelete(categoryId, categoryName) {
        Swal.fire({
            title: 'Yakin mau hapus data ini?',
            html: `Kategori <strong>"${categoryName}"</strong> akan dihapus permanen.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + categoryId).submit();
            }
        });
    }
</script>
@endpush