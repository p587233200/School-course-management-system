@extends('layouts.topbar')

@section('content')
    <div class="container mx-auto px-4 py-8">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif
    
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">{{ $course->name ?? N/A }} - 新增公告頁面</h1>
        {{-- 新增公告 --}}
        <div class="bg-white p-6 rounded shadow mb-8">
            <h2 class="text-xl font-semibold mb-4">📢 新增公告</h2>
            <form action="{{ route('teacher.announcement.store', $course->courseID) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium mb-1">標題</label>
                    <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">內容</label>
                    <textarea name="content" class="w-full border px-3 py-2 rounded" rows="3" required></textarea>
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    發布公告（含 Email 通知）
                </button>
            </form>
        </div>
    </div>
@endsection
