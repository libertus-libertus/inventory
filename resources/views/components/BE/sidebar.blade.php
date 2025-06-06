<div class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out mt-16"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

    <div class="h-full overflow-y-auto py-4 sidebar-scroll-hidden">
        <nav class="px-4 space-y-1">

            {{-- Menu Utama Section --}}
            <div class="mb-6">
                <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Menu Utama</h3>
                <div class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link {{ Request::routeIs('dashboard') ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-tachometer-alt mr-3 sidebar-icon"></i>
                        Dashboard
                    </a>
                </div>
            </div>

            @if(auth()->user()->role === 'admin')
                {{-- Menu Khusus Admin --}}
                <div class="mb-6">
                    <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Manajemen</h3>
                    <div class="space-y-1">
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-tags mr-3 sidebar-icon"></i>
                            Kategori
                        </a>

                        <a href="{{ route('products.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-box mr-3 sidebar-icon"></i>
                            Data Produk
                        </a>

                        <a href="{{ route('suppliers.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-truck mr-3 sidebar-icon"></i>
                            Supplier
                        </a>

                        <a href="{{ route('customers.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-users mr-3 sidebar-icon"></i>
                            Pelanggan
                        </a>
                    </div>
                </div>

                {{-- Pengaturan --}}
                <div class="mb-6">
                    <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Pengaturan</h3>
                    <div class="space-y-1">
                        <a href="{{ route('users.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-user-cog mr-3 sidebar-icon"></i>
                            Manajemen User
                        </a>
                    </div>
                </div>
            @endif

            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'kasir')
                {{-- Transaksi --}}
                <div class="mb-6">
                    <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Transaksi</h3>
                    <div class="space-y-1">
                        <a href="{{ route('stock_ins.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-arrow-down mr-3 text-green-600 sidebar-icon"></i>
                            Barang Masuk
                        </a>

                        <a href="{{ route('stock_outs.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-arrow-up mr-3 text-red-600 sidebar-icon"></i>
                            Barang Keluar
                        </a>
                    </div>
                </div>
            @endif

            @if(auth()->user()->role === 'admin')
                {{-- Laporan --}}
                <div class="mb-6">
                    <h3 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Laporan</h3>
                    <div class="space-y-1">
                        <a href="{{ route('stocks') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors sidebar-link">
                            <i class="fas fa-chart-bar mr-3 sidebar-icon"></i>
                            Laporan Stok
                        </a>
                    </div>
                </div>
            @endif

        </nav>
    </div>
</div>
