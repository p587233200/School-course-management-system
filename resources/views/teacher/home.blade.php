@extends('layouts.topbar')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-extrabold mb-10 text-indigo-700">我的授課清單</h1>

    @if ($courses->isEmpty())
        <p class="text-gray-600 text-center">目前尚未建立任何授課課程。</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($courses as $course)
            <div class="bg-white border p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold mb-2">{{ $course->name }}</h2>
                <p class="text-sm text-gray-600 mb-4">
                    👨‍🏫 授課老師：{{ $course->teacher->name ?? 'N/A' }}
                </p>

                <a href="{{ route('teacher.course.detail', $course->courseID) }}"
                   class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-full">
                    管理公告與作業
                </a>
            </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
