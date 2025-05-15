
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel 學習系統')</title>
    @vite('resources/css/app.css')
    {{-- 計算長條圖 --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- 導覽列 -->
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-indigo-700">
                 學習管理系統
            </div>
            @if(session()->has('user_name') && session()->has('user_role'))
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">👤  {{ session('user_id') }}_{{ session('user_name') }}（{{ session('user_role') }}）</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">
                            登出
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>
    
</body>
</html>

