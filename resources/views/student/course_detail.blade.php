{{-- resources/views/student/course_detail.blade.php --}}
@extends('layouts.topbar')

@section('content')
<div class="container mx-auto px-4 py-6">
    
    <h1 class="text-2xl font-bold mb-4 text-indigo-700">{{ $course->name }} - 詳細資訊</h1>
    
    {{-- 課程公告 --}}
    <div class="mb-6 bg-white p-3">
        <h2 class="text-xl font-semibold mb-3">📢 課程公告</h2>
        <ul class="grid grid-cols-2 gap-3 max-h-[380px] overflow-y-auto">
            @forelse ($announcements as $ann)
            <li class="bg-gray-200 p-2 m-1 rounded shadow">
                    <h3 class="font-semibold">{{ $ann->title }}</h3>
                    <p>{{ $ann->content }}</p>
                    <span class="text-sm text-gray-500">{{ $ann->timestamp }}</span>
                </li>
            @empty
                <p class="text-gray-600">尚無公告</p>
            @endforelse
        </ul>
    </div>

    {{-- 作業列表 --}}
    <div>
        <h2 class="text-xl font-semibold mb-3">📚 作業列表</h2>
        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse ($assignments as $assignment)
                <li class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold">{{ $assignment->title }}</h3>
                    <p>{{ $assignment->content }}</p>
                    <p class="text-sm text-gray-500">截止時間：{{ \Carbon\Carbon::parse($assignment->deadline)->format('Y-m-d H:i') }}</p>
    
                    @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($assignment->deadline)))
                        <!-- 如果超過截止時間，顯示截止 -->
                        <p class="text-red-500 text-sm  py-5">已過截止時間，無法上傳作業</p>
                    @else
                        <!-- 如果未過截止時間，顯示上傳作業按鈕 -->
                        <a href="{{ route('student.assignment.upload', $assignment->assignmentID) }}"
                           class="mt-2 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                            上傳作業
                        </a>
                    @endif
                    
                    <a href="{{ route('student.assignment.grade', $assignment->assignmentID) }}"
                       class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                        查看詳細成績
                    </a>
                </li>
            @empty
                <p class="text-gray-600">尚無作業</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection
