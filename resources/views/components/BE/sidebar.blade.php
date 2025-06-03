<div class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out mt-16"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

    <div class="h-full overflow-y-auto py-4">
        <nav class="px-4 space-y-1">
            <div class="mb-6" x-data="{ open: true }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 rounded-md hover:bg-gray-100">
                    <span>Menu Utama</span>
                    <i class="fas" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2" class="space-y-1">
                    <a href="#" @click="activeTab = 'dashboard'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'dashboard' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>

                    <a href="#" @click="activeTab = 'products'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'products' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-box mr-3"></i>
                        Data Produk
                    </a>

                    <a href="#" @click="activeTab = 'categories'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'categories' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-tags mr-3"></i>
                        Kategori
                    </a>

                    <a href="#" @click="activeTab = 'stock'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'stock' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-warehouse mr-3"></i>
                        Kelola Stok
                    </a>
                </div>
            </div>

            <div class="mb-6" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 rounded-md hover:bg-gray-100">
                    <span>Transaksi</span>
                    <i class="fas" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2" class="space-y-1">
                    <a href="#" @click="activeTab = 'stock-in'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'stock-in' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-arrow-down mr-3 text-green-600"></i>
                        Barang Masuk
                    </a>

                    <a href="#" @click="activeTab = 'stock-out'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'stock-out' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-arrow-up mr-3 text-red-600"></i>
                        Barang Keluar
                    </a>

                    <a href="#" @click="activeTab = 'orders'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'orders' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        Pesanan
                    </a>
                </div>
            </div>

            <div class="mb-6" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 rounded-md hover:bg-gray-100">
                    <span>Laporan</span>
                    <i class="fas" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2" class="space-y-1">
                    <a href="#" @click="activeTab = 'reports'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'reports' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-chart-bar mr-3"></i>
                        Laporan Stok
                    </a>
                </div>
            </div>

            <div class="mb-6" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 rounded-md hover:bg-gray-100">
                    <span>Master Data</span>
                    <i class="fas" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2" class="space-y-1">
                    <a href="#" @click="activeTab = 'suppliers'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'suppliers' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-truck mr-3"></i>
                        Supplier
                    </a>

                    <a href="#" @click="activeTab = 'customers'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'customers' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-users mr-3"></i>
                        Pelanggan
                    </a>
                </div>
            </div>

            <div class="mb-6" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 rounded-md hover:bg-gray-100">
                    <span>Pengaturan</span>
                    <i class="fas" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2" class="space-y-1">
                    <a href="#" @click="activeTab = 'users'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'users' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-user-cog mr-3"></i>
                        Manajemen User
                    </a>

                    <a href="#" @click="activeTab = 'settings'"
                        class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors"
                        :class="activeTab === 'settings' ? 'bg-blue-100 text-blue-700 border-r-2 border-blue-500' : 'text-gray-700 hover:bg-gray-100'">
                        <i class="fas fa-cog mr-3"></i>
                        Pengaturan Sistem
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>