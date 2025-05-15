@extends('layouts.topbar')

@section('content')
    <div class="container mx-auto px-4 py-8">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif
    <h1 class="text-2xl font-bold mb-8 text-indigo-700">{{ $course->name }} - 詳細資訊</h1>


    {{-- 課程公告 --}}
    <div class="mb-6 bg-white p-2">
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-xl font-semibold">📢 課程公告</h2>
            <a href="{{ route('teacher.announcement.create', $course->courseID) }}"
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">

                ➕ 新增公告
            </a>
        </div>

        <ul class="grid grid-cols-2 gap-3 max-h-[380px] overflow-y-auto">
            @forelse ($course->announcements as $ann)
                <li class="bg-gray-200 p-2 m-1 rounded shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold">{{ $ann->title }}</h3>
                            <p>{{ $ann->content }}</p>
                            <span class="text-sm text-gray-500">{{ $ann->timestamp }}</span>
                        </div>
                        <a href="{{ route('teacher.announcement.edit', $ann->announcementID) }}"
                        class="text-blue-600 hover:underline text-sm font-semibold">
                            ✏️ 編輯
                        </a>
                    </div>
                </li>
            @empty
                <p class="text-gray-600">尚無公告</p>
            @endforelse
        </ul>
    </div>

    {{-- 作業列表 --}}
        <div class="mb-8">
            <div class="flex justify-between items-center m-3">
                <h2 class="text-xl font-semibold">📚 作業列表</h2>
                <a href="{{ route('teacher.assignment.create', $course->courseID) }}"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">
                    ➕ 新增作業
                </a>
            </div>

            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @forelse ($course->assignments as $assignment)
                    <li class="bg-white p-4 rounded shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-lg">{{ $assignment->title }}</h3>
                                <p class="text-gray-700">{{ $assignment->content }}</p>
                                <p class="text-sm text-gray-500 mt-2">截止時間：{{ \Carbon\Carbon::parse($assignment->deadline)->format('Y-m-d H:i') }}</p>
                            </div>
                            <a href="{{ route('teacher.assignment.edit', $assignment->assignmentID) }}"
                            class="text-blue-600 hover:underline text-sm font-semibold">
                                ✏️ 編輯
                            </a>
                        </div>

                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('teacher.assignment.submissions', $assignment->assignmentID) }}"
                            class="px-3 py-1 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition text-sm">
                                📥 查看繳交情況
                            </a>
                            <a href="{{ route('teacher.assignment.grade', $assignment->assignmentID) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">
                                📥 查看成績分布
                             </a>
                             <a href="{{ route('teacher.assignment.downloadGrades', $assignment->assignmentID) }}"
                                class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition text-sm">
                                 ⬇️ 下載全班成績
                             </a>
                            
                        </div>
                    </li>
                @empty
                    <p class="text-gray-600">尚無作業</p>
                @endforelse
            </ul>
        </div>

    {{-- 學生作業查詢與評分 --}}
    {{-- <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">📂 繳交作業與評分</h2>
        @foreach ($assignments as $assignment)
            <div class="mb-6">
                <h3 class="font-bold text-lg">{{ $assignment->title }}</h3>
                <ul class="mt-2 space-y-2">
                    @foreach ($assignment->submissions as $submission)
                        <li class="p-3 border rounded flex justify-between items-center">
                            <div>
                                👤 {{ $submission->studentID }} ‧
                                <a href="{{ asset('storage/' . $submission->file_url) }}" class="text-blue-600 underline" target="_blank">下載作業</a>
                            </div>
                            <form action="{{ route('teacher.assignment.grade', [$assignment->assignmentID, $submission->studentID]) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <input type="number" name="score" value="{{ $submission->score }}" class="w-16 border rounded px-2 py-1" required>
                                <input type="text" name="feedback" value="{{ $submission->feedback }}" class="w-64 border rounded px-2 py-1" placeholder="評語">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    儲存
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div> --}}
</div>
@endsection
