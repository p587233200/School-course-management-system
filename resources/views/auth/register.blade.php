
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-green-100 to-green-300 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-green-600 mb-6">註冊帳號</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="role" class="block text-sm font-semibold text-gray-700">身分</label>
                <select name="role" id="role"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none" required>
                    <option value="">請選擇</option>
                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>學生</option>
                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>老師</option>
                </select>
            </div>

            <div>
                <label for="ID" class="block text-sm font-semibold text-gray-700">學號</label>
                <input type="text" name="ID" id="ID" value="{{ old('ID') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none {{ $errors->has('ID') ? 'border-red-500' : '' }}" required>
            </div>

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700">姓名</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none {{ $errors->has('name') ? 'border-red-500' : '' }}" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none {{ $errors->has('email') ? 'border-red-500' : '' }}" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700">密碼</label>
                <input type="password" name="password" id="password"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none {{ $errors->has('password') ? 'border-red-500' : '' }}" required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">確認密碼</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300 outline-none" required>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-semibold transition duration-200">
                註冊
            </button>
        </form>
        
    </div>
</body>
</html>
