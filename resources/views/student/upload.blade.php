@extends('layouts.topbar')


@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-2xl font-bold mb-4">上傳作業：{{ $assignment->title }}</h2>

    <form action="{{ route('student.assignment.submit', $assignment->assignmentID) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="report" class="block mb-2 font-medium text-gray-700">選擇檔案上傳</label>
            <input type="file" name="report" id="report" required class="w-full border rounded px-4 py-2">

            @error('report')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            上傳
        </button>
    </form>
</div>
@endsection
