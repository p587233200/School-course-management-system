<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-blue-200 to-indigo-300 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">登入學習系統</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700">密碼</label>
                <input type="password" name="password" id="password"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none" required>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-semibold transition duration-200">
                登入
            </button>
        </form>

        <div class="mt-4 text-center text-sm text-gray-600">
            還沒有註冊帳號嗎？
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">點此註冊</a>
        </div>
    </div>
</body>
</html>
