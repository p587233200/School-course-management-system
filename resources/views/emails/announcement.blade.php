<!DOCTYPE html>
<html>
<head>
    <title>>您的「{{ $course->name }}」公告如下：</title>


</head>
<body>

    <p>您的「{{ $course->name }}」課程公告如下：</p>

<ul>

    <li>公告標題：{{ $announcement->title }}</li>
    <li>公告內容：{{ $announcement->content }}</li>
    <li>發布時間：{{ $announcement->timestamp }}</li>
</ul>

<p>此致<br>感謝</p>
</body>
</html>

