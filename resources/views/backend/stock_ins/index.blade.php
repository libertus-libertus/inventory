@extends('layouts.app')

@section('title', 'Barang Masuk')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Barang Masuk</h1>
        <p class="text-gray-600">Riwayat transaksi barang masuk dari supplier.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Barang Masuk</h3>
            <a href="javascript:void(0)" data-modal-target="#product-modal"
               class="px-4 py-2 bg-green-600 text-white text-xs font-semibold rounded hover:bg-green-700 open-product-modal">
                <i class="fas fa-plus mr-1"></i> Tambah Barang Masuk
            </a>
        </div>

        @if ($stockIns->isEmpty())
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-box text-5xl mb-3"></i>
                <p class="text-lg">Belum ada transaksi barang masuk.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="stock-ins-table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Kode Referensi</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Tanggal</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Produk</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Supplier</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Jumlah</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">User</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($stockIns as $stockIn)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $stockIn->reference_code }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ \Carbon\Carbon::parse($stockIn->stock_in_date)->format('d M Y') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $stockIn->product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $stockIn->supplier->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $stockIn->quantity }} {{ $stockIn->product->unit }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $stockIn->user->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <a href="{{ route('stock_ins.show', $stockIn->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Modal Pilih Produk --}}
    <div id="product-modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-30 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6 relative">
            <h2 class="text-lg font-semibold mb-4">Pilih Produk</h2>
            <button class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 close-product-modal">
                <i class="fas fa-times"></i>
            </button>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="product-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Nama Produk</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">SKU</th>
                            <th class="px-4 py-2 text-left text-xs text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $product->sku }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('stock_ins.create', ['product_id' => $product->id]) }}"
                                       class="text-green-600 hover:underline text-sm">
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#stock-ins-table').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
            }
        });

        $('#product-table').DataTable();

        $('.open-product-modal').on('click', function () {
            $('#product-modal').removeClass('hidden');
        });

        $('.close-product-modal').on('click', function () {
            $('#product-modal').addClass('hidden');
        });
    });
</script>
@endpush
