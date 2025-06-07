@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Data Stok Produk</h1>
        <p class="text-gray-600">Daftar semua stok produk yang terdaftar dalam sistem.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        @if ($products->isEmpty())
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-box-open text-5xl mb-3"></i>
                <p class="text-lg">Belum ada data produk.</p>
                <p class="text-sm">Silakan tambahkan produk baru untuk mulai mengelola.</p>
            </div>
        @else
            {{-- Tabel Data Produk --}}
            <div class="overflow-x-auto mb-6">
                <table id="products-table" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th width="5%" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Satuan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600 text-center">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->sku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->unit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- Tombol Export PDF & Form Import Excel --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-4">
            <a href="{{ route('stocks.exportPdf') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow text-sm w-full md:w-auto text-center">
                Export PDF
            </a>

            <form action="{{ route('stocks.import') }}" method="POST" enctype="multipart/form-data"
                  class="flex flex-col sm:flex-row items-center gap-2 w-full md:w-auto">
                @csrf
                <input type="file" name="file" required
                       class="border rounded px-2 py-1 text-sm w-full sm:w-auto">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm w-full sm:w-auto">
                    Import Excel
                </button>
            </form>
        </div>

    </div>
@endsection

@push('js')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables CDN -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#products-table').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
                }
            });
        });
    </script>
@endpush
