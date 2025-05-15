<p>{{ $submission->student->name }} 同學您好，</p>

<p>您的「{{ $assignment->title }}」作業成績如下：</p>

<ul>
    <li>分數：{{ $submission->score }}</li>
    <li>評語：{{ $submission->feedback }}</li>
</ul>

<p>請至平台確認作業詳情。</p>

<p>此致<br>感謝</p>
