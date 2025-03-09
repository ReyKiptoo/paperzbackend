<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Paperz Admin') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-primary {
            background-color: #FF6B6B;
        }
        .text-primary {
            color: #FF6B6B;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-primary">Paperz Admin</h1>
            </div>
            <nav class="mt-4">
                <a href="/dashboard" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-primary">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>
</body>
</html>
