<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIM-PPM UNU Blitar')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        unu: {
                            primary: '#1B5E20',
                            secondary: '#388E3C',
                            accent: '#C8E6C9',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-unu-primary text-white flex flex-col">
        <div class="px-6 py-5 border-b border-white/10">
            <h1 class="text-xl font-semibold">SIM-PPM</h1>
            <p class="text-sm text-white/80">UNU Blitar</p>
        </div>
        <nav class="flex-1 px-3 py-4 space-y-1">
            <a href="{{ url('/') }}" class="block rounded-md px-3 py-2 hover:bg-white/10">Dashboard</a>
            <a href="{{ url('/proposals') }}" class="block rounded-md px-3 py-2 hover:bg-white/10">Proposal</a>
            <a href="#" class="block rounded-md px-3 py-2 hover:bg-white/10">Laporan Kemajuan</a>
            <a href="#" class="block rounded-md px-3 py-2 hover:bg-white/10">Laporan Akhir</a>
            <a href="#" class="block rounded-md px-3 py-2 hover:bg-white/10">Luaran</a>
            <a href="#" class="block rounded-md px-3 py-2 hover:bg-white/10">Review</a>
            <a href="#" class="block rounded-md px-3 py-2 hover:bg-white/10">Pengaturan</a>
        </nav>
        <div class="px-6 py-4 mt-auto text-sm text-white/80">
            &copy; {{ date('Y') }} UNU Blitar
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1">
        <header class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <h2 class="text-lg font-medium text-gray-900">@yield('header', 'Dashboard')</h2>
            </div>
        </header>
        <div class="max-w-7xl mx-auto p-6">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>


