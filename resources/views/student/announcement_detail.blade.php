@extends('layouts.topbar')

@section('content')

<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-indigo-700 mb-6">{{ $announcement->course->name ?? N/A }} - 詳細公告頁面</h1>


    <div class="bg-white p-6 rounded shadow mb-8">

        <form action="{{ route('teacher.announcement.update', $announcement->announcementID) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold mb-4">✏️ 查看詳細公告</h2>
            <div>
                <label for="title" class="block font-semibold">標題</label>
                <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div>
                <label for="content" class="block font-semibold">內容</label>
                <textarea name="content" id="content" rows="12"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>{{ old('content', $announcement->content) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    更新公告
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
