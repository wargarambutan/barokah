<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>

<body>
    <!-- Pastikan $messageContent diterima dan ditampilkan dengan benar -->
    <p>{!! nl2br(e($messageContent)) !!}</p>
</body>

</html>
