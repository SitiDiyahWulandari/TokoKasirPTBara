<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Dashboard') }} | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        .active-menu {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #fff;
        }
        .dropdown-enter-active, .dropdown-leave-active {
            transition: all 0.2s;
        }
        .dropdown-enter-from, .dropdown-leave-to {
            opacity: 0;
            transform: translateY(-10px);
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Desktop Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-primary-800 text-white border-r border-primary-900">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 px-4 bg-primary-900">
                    <span class="text-xl font-bold tracking-wider">{{ config('app.name', 'MYSTORE') }}</span>
                </div>
                
                <!-- User Profile -->
                <div class="flex items-center px-4 py-4 border-b border-primary-700">
                    <div class="w-10 h-10 rounded-full bg-primary-600 flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="ml-3">
                        <div class="font-medium">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-primary-200">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) active-menu @endif flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors mx-2">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>

                    <!-- Products -->
                    <a href="{{ route('products.index') }}" class="@if(request()->routeIs('products.*')) active-menu @endif flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors mx-2">
                        <i class="fas fa-boxes mr-3"></i>
                        Produk
                        <span class="ml-auto bg-primary-600 text-xs px-2 py-1 rounded-full">15</span>
                    </a>

                    <!-- Sales -->
                    <a href="{{ route('sales.index') }}" class="@if(request()->routeIs('sales.*')) active-menu @endif flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors mx-2">
                        <i class="fas fa-cash-register mr-3"></i>
                        Penjualan
                        <span class="ml-auto bg-primary-600 text-xs px-2 py-1 rounded-full">3</span>
                    </a>

                    <!-- History -->
                    <a href="{{ route('history.index') }}" class="@if(request()->routeIs('history.*')) active-menu @endif flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors mx-2">
                        <i class="fas fa-history mr-3"></i>
                        Riwayat
                    </a>
                </nav>

                <!-- Logout -->
                <div class="p-4 border-t border-primary-700">
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center px-4 py-2 text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors">
                       <i class="fas fa-sign-out-alt mr-3"></i>
                       Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar Backdrop -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 md:hidden" id="sidebarBackdrop" style="display: none;"></div>

        <!-- Mobile Sidebar -->
        <div class="fixed inset-y-0 left-0 transform -translate-x-full w-64 bg-primary-800 text-white z-50 sidebar-transition" id="mobileSidebar">
            <!-- Mobile sidebar content same as desktop -->
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile menu button -->
                    <button id="mobileMenuButton" class="md:hidden text-gray-500 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Search -->
                    <div class="flex-1 max-w-md mx-4">
                        <div class="relative">
                            <input type="text" placeholder="Cari..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <div class="absolute left-3 top-2.5 text-gray-400">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-500 rounded-full hover:bg-gray-100 focus:outline-none">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- User Dropdown -->
                        <div class="relative">
                            <button id="userDropdownButton" class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-primary-600 flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="hidden md:inline-block">{{ Auth::user()->name }}</span>
                            </button>
                            
                            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-circle mr-2"></i> Profil
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i> Pengaturan
                                </a>
                                <div class="border-t border-gray-200"></div>
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                   <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">@yield('header')</h2>
                    <div class="flex space-x-2">
                        @yield('header-actions')
                    </div>
                </div>

                <!-- Breadcrumbs -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600">
                                <i class="fas fa-home mr-2"></i>
                                Home
                            </a>
                        </li>
                        @yield('breadcrumbs')
                    </ol>
                </nav>

                <!-- Content -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Mobile sidebar toggle
        $(document).ready(function() {
            // Mobile menu toggle
            $('#mobileMenuButton').click(function() {
                $('#mobileSidebar').toggleClass('-translate-x-full');
                $('#sidebarBackdrop').toggle();
            });

            // Close sidebar when clicking on backdrop
            $('#sidebarBackdrop').click(function() {
                $('#mobileSidebar').addClass('-translate-x-full');
                $(this).hide();
            });

            // User dropdown toggle
            $('#userDropdownButton').click(function(e) {
                e.stopPropagation();
                $('#userDropdown').toggle();
            });

            // Close dropdown when clicking outside
            $(document).click(function() {
                $('#userDropdown').hide();
            });

            // Prevent dropdown from closing when clicking inside
            $('#userDropdown').click(function(e) {
                e.stopPropagation();
            });
        });
    </script>

    @stack('scripts')
</body>
</html>