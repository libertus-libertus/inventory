@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Data Kategori</h1>
        <p class="text-gray-600">Daftar semua kategori produk yang terdaftar dalam sistem.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Kategori</h3>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus mr-2"></i> Tambah Kategori
            </a>
        </div>

        {{-- Pesan sukses sekarang ditangani oleh SweetAlert2 di layouts/app.blade.php --}}
        {{-- @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.651a1.2 1.2 0 1 1-1.697-1.697L8.303 9.407l-2.651-2.651a1.2 1.2 0 0 1 1.697-1.697L10 7.71l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.407l2.651 2.651a1.2 1.2 0 0 1 0 1.697z"/></svg>
                </span>
            </div>
        @endif --}}

        @if ($categories->isEmpty() && !request()->has('search'))
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-box-open text-5xl mb-3"></i>
                <p class="text-lg">Belum ada data kategori.</p>
                <p class="text-sm">Silakan tambahkan kategori baru untuk mulai mengelola.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table id="categories-table" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Kategori
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deskripsi
                            </th>
                            <th scope="col" class="relative px-6 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">
                                    {{ $category->name }} {{-- Menggunakan $category->name --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $category->description ?: '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="{{ route('categories.show', $category->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-900 mr-3" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Mengubah onsubmit untuk SweetAlert2 --}}
                                    <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $category->id }}, '{{ $category->name }}')" class="text-red-600 hover:text-red-900" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#categories-table').DataTable({
            responsive: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
            }
        });
    });

    // Fungsi untuk menampilkan SweetAlert2 konfirmasi hapus (diletakkan di sini agar tersedia untuk DataTables)
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