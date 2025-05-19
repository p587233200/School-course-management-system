@extends('layouts.topbar')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-extrabold mb-10 text-indigo-700">我的課程清單</h1>

    {{-- 1. 自己選修的課 --}}
    <div class="mb-12">
        <h2 class="text-2xl font-bold mb-6">📚 我選修的課程</h2>
        @if($myCourses->isEmpty())
            <p class="text-gray-600">目前尚未選修任何課程。</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($myCourses as $course)
                <div class="bg-white border p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold mb-2">{{ $course->name }}</h3>
                    <p class="text-sm text-gray-600 mb-4">👨‍🏫 {{ $course->teacher->name }}</p>
                    <a href="{{ route('student.course.detail', $course->courseID) }}"
                       class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-full">
                        查看公告與作業
                    </a>
                </div>
            @endforeach
        </div>
        @endif
    </div>

    {{-- 2. 身為 TA 的課 --}}
    <div>
        <h2 class="text-2xl font-bold mb-6">🛠 我擔任助教的課程</h2>
        @if($taCourses->isEmpty())
            <p class="text-gray-600">目前沒有擔任任何課程的助教。</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($taCourses as $course)
                <div class="bg-white border p-6 rounded-xl shadow">
                    <h3 class="text-xl font-bold mb-2">{{ $course->name }}</h3>
                    <p class="text-sm text-gray-600 mb-4">👨‍🏫 {{ $course->teacher->name }}</p>
                    <a href="{{ route('teacher.course.detail', $course->courseID) }}"
                       class="inline-block px-4 py-2 bg-green-600 text-white rounded-full">
                        (TA) 管理課程
                    </a>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection

