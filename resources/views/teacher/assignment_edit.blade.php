@extends('layouts.topbar')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-indigo-700 mb-6">{{ $assignment->course->name ?? N/A }} - 修改作業頁面</h1>


    <div class="bg-white p-6 rounded shadow mb-8">

        <form action="{{ route('teacher.assignment.update', $assignment->assignmentID) }}" method="POST">
            @csrf
            @method('PUT')

            <h2 class="text-2xl font-bold mb-6">✏️ 修改作業</h2>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">標題</label>
                <input type="text" name="title" value="{{ old('title', $assignment->title) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">內容</label>
                <textarea name="content" rows="5" class="w-full border border-gray-300 rounded px-3 py-2" required>{{ old('content', $assignment->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">截止時間</label>
                <input type="datetime-local" name="deadline"
                    value="{{ \Carbon\Carbon::parse($assignment->deadline)->format('Y-m-d\TH:i') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    ✅ 更新作業
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
