@extends('layouts.app')

@section('title', 'Data Supplier')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Data Supplier</h1>
        <p class="text-gray-600">Daftar semua supplier yang terdaftar dalam sistem.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Supplier</h3>
            <a href="{{ route('suppliers.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus mr-2"></i> Tambah Supplier
            </a>
        </div>

        @if ($suppliers->isEmpty())
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-user-times text-5xl mb-3"></i>
                <p class="text-lg">Belum ada data supplier.</p>
                <p class="text-sm">Silakan tambahkan supplier baru untuk mulai mengelola.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table id="suppliers-table" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Supplier
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Telepon
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th scope="col" class="relative px-6 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">
                                    {{ $supplier->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $supplier->phone ?: '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ Str::limit($supplier->address, 50, '...') ?: '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-blue-600 hover:text-blue-900 mr-3" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $supplier->id }}" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDeleteSupplier({{ $supplier->id }}, '{{ $supplier->name }}')" class="text-red-600 hover:text-red-900" title="Hapus">
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
        $('#suppliers-table').DataTable({
            responsive: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
            }
        });
    });

    // Fungsi untuk menampilkan SweetAlert2 konfirmasi hapus supplier
    function confirmDeleteSupplier(supplierId, supplierName) {
        Swal.fire({
            title: 'Yakin mau hapus supplier ini?',
            html: `Supplier <strong>"${supplierName}"</strong> akan dihapus permanen.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + supplierId).submit();
            }
        });
    }
</script>
@endpush