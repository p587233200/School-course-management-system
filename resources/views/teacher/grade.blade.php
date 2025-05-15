@extends('layouts.topbar')


@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-2xl font-bold mb-4">作業成績：{{ $assignment->title }}</h2>

    <div class="mb-4">
        <h3 class="text-xl font-semibold">全班成績分佈</h3>
        <canvas id="scoreDistributionChart" width="400" height="200"></canvas>
    </div>

    <div class="mb-4">
        <a href="{{ route('teacher.course.detail', $assignment->courseID) }}"
           class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            返回課程
        </a>
    </div>
</div>

<script>
    // 從後端傳過來的資料
    var scoreDistribution = @json($scoreDistribution);

    // 分數區間 (X 軸)
    var labels = Object.keys(scoreDistribution);
    
    // 每個分數的學生數量 (Y 軸)
    var data = Object.values(scoreDistribution);

    var ctx = document.getElementById('scoreDistributionChart').getContext('2d');
    var scoreDistributionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '成績分佈',
                data: data,
                backgroundColor: '#4CAF50',
                borderColor: '#388E3C',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
