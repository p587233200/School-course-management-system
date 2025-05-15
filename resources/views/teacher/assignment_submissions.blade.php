@extends('layouts.topbar')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow rounded">
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif
    <h2 class="text-2xl font-bold mb-6">📂 作業繳交紀錄 - {{ $assignment->title }}</h2>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border">學生姓名</th>
                <th class="p-3 border">檔案</th>
                <th class="p-3 border">繳交時間</th>
                <th class="p-3 border">分數</th>
                <th class="p-3 border">評語</th>
                <th class="p-3 border">修改評分與評語</th>
                <th class="p-3 border">寄送Emial</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($assignment->course->students as $student)
                @php
                    $submission = $assignment->submissions->firstWhere('studentID', (string)$student->studentID);
                @endphp
                <tr class="hover:bg-gray-50 align-top">
                    <td class="p-3 border">{{ $student->name }}</td>
                    <td class="p-3 border">
                        @if ($submission && $submission->file_url)
                            <a href="{{ asset('storage/' . $submission->file_url) }}" class="text-blue-600 underline" download>
                                下載檔案
                            </a>
                        @else
                            <span class="text-red-400">未繳交</span>
                        @endif
                    </td>
                    <td class="p-3 border">{{ $submission ? \Carbon\Carbon::parse($submission->submit_timestamp)->format('Y-m-d H:i') : '—' }}</td>
                    <td class="p-3 border">{{ $submission->score ?? '未評分' }}</td>
                    <td class="p-3 border text-sm whitespace-pre-wrap">{{ $submission->feedback ?? '無' }}</td>
                    <td class="p-3 border">
                        @if ($submission)
                            <form action="{{ route('teacher.assignment.score') }}" method="POST" class="space-y-2">
                                @csrf
                                <input type="hidden" name="studentID" value="{{ $student->studentID }}">
                                <input type="hidden" name="assignmentID" value="{{ $assignment->assignmentID }}">
                                <div>
                                    <label class="block text-sm mb-1">分數：
                                    <input type="number" name="score" min="0" max="100" value="{{ $submission->score ?? '' }}" class="w-20 border px-2 py-1 rounded">
                                    </label>
                                </div>
                                <div>
                                    <label class="block text-sm mb-1">評語：</label>
                                    <textarea name="feedback" rows="1" class="w-full border px-2 py-1 rounded">{{ $submission->feedback ?? '' }}</textarea>
                                </div>
                                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">送出</button>
                            </form>
                        @else
                            <span class="text-red-500 italic">尚未繳交作業，無法評分</span>
                        @endif
                    </td>
                    <td class="p-3 border">
                        @if ($submission && isset($submission->score))
                            <form action="{{ route('teacher.assignment.email') }}" method="POST">
                                @csrf
                                <input type="hidden" name="studentID" value="{{ $student->studentID }}">
                                <input type="hidden" name="assignmentID" value="{{ $assignment->assignmentID }}">
                                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                    寄送 Email
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400 italic">無法寄送</span>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection

