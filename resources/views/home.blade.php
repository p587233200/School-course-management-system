<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-blue-300 via-indigo-400 to-purple-500 flex flex-row items-center justify-center min-h-screen">

    <div class="text-center px-6 py-12">
        <h1 class="text-5xl font-extrabold text-white mb-6 drop-shadow-lg">
            歡迎來到 
        </h1>
        <h1 class="text-5xl font-extrabold text-white mb-6 drop-shadow-lg">
            學習管理系統
        </h1>

        <p class="text-xl text-white mb-8">
            輕鬆學習，快速成長
        </p>

        <a href="{{ route('login_form') }}"
           class="px-8 py-3 bg-indigo-600 text-white text-lg rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
            前往登入
        </a>
    </div>

</body>
</html>
