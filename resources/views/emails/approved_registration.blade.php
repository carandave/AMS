<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approved Registration Email</title>
</head>
<body>
    <h1>Dear {{ $user->first_name }} {{ $user->last_name }}</h1>
    <p>Your registration has been approved.</p>
    <p>Status: {{ $status }}</p>
    <p>Thank you for your patience!</p>
</body>
</html>