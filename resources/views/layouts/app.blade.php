<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- DataTables CSS CDN --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    {{-- SweetAlert2 CSS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .dropdown-content {
            display: none;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* --- Tambahan CSS untuk layout footer di bawah --- */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Custom Scrollbar Styling (Webkit Browsers like Chrome, Safari) */
        .sidebar-scroll-hidden::-webkit-scrollbar {
            display: none; /* Hide scrollbar for Chrome, Safari, and Opera */
        }

        /* Custom Scrollbar Styling (Firefox) */
        .sidebar-scroll-hidden {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f3f4f6;
        }

        .main-content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-top: 4rem;
            margin-left: 16rem;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        @media (max-width: 1023px) {
            .main-content-wrapper {
                margin-left: 0;
            }
        }

        .main-content-wrapper>div.p-6 {
            padding-left: 0;
            padding-right: 0;
        }

        .main-content-wrapper .content-area {
            padding: 1.5rem;
            flex-grow: 1;
        }

        /* Adjusted active link styling for better icon alignment */
        .sidebar-link.active .sidebar-icon {
            transform: none; /* Reset any unintended transformations */
            position: relative; /* Ensure icon is positioned correctly */
            z-index: 1; /* Keep icon above any border */
        }
    </style>
    @stack('css')
</head>

<body class="h-full bg-gray-100" x-data="inventoryDashboard()">
    @include('components.BE.header')

    @include('components.BE.sidebar')

    <div class="main-content-wrapper">
        <div class="content-area">
            @yield('content')
        </div>
    </div>

    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black bg-opacity-50 lg:hidden"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <script>
        function inventoryDashboard() {
            return {
                sidebarOpen: false,
                activeTab: 'dashboard',
            }
        }
    </script>
    {{-- DataTables JS CDN --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    {{-- SweetAlert2 JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Script untuk menampilkan pesan sukses dari session --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000 // Durasi tampil 2 detik
            });
        </script>
    @endif
    
    @stack('js')
</body>

</html>