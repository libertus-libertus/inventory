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

        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body class="h-full bg-gray-100" x-data="inventoryDashboard()">
    @include('components.BE.header')

    @include('components.BE.sidebar')

    <div class="main-content-wrapper">
        @yield('content')

        @include('components.BE.footer')
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
</body>

</html>