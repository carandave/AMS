<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification Registration Email</title>
</head>
<body>

    @if($status == "Approved")
        <h1>Dear {{ $user->first_name }},</h1>
        <p>We are pleased to inform you that your registration for PBTS Thesis Archive has been {{ $status }}.</p>
        <p>You can now log in to your account using the following credentials:</p>
        <p>Username: {{ $user->email }}</p>
        <p>Password: {{ $newpassword }}</p>
        <br>
        <p>Full Name: {{ $user->first_name }}, {{ $user->last_name }}</p>
        <p>Status: {{ $status }}</p>
        <p>{{ $status }} Date: {{ $datetoday }}</p>
        <p>Please check your account for further instructions or contact us for any additional information. We look forward to having you with us!</p>
        <p>If you have any questions, feel free to reach out to us</p>

    @endif

    @if($status == "Denied")
        <h1>Dear {{ $user->first_name }},</h1>
        <p>We regret to inform you that your registration for PBTS Thesis Archive has been {{ $status }} at this time..</p>
        <p>Full Name: {{ $user->first_name }}, {{ $user->last_name }}</p>
        <p>Status: {{ $status }}</p>
        <p>{{ $status }} Date: {{ $datetoday }}</p>
        <p>If you would like more information regarding this decision or wish to appeal, please contact us.</p>
        <p>We appreciate your interest in out PBTS Thesis Archive, and we encourage you to apply again in the future.</p>
    @endif

    @if($status == "New Account")

        <h1>Dear {{ $user->first_name }},</h1>
        <h3></h3>
        <p>We’re pleased to inform you that an account for {{ $user->role }} has been created for you on PBTS Thesis Archive by the Administrator. Here are your login details:</p>
        <p>Username: {{ $user->email }}</p>
        <p>Password: {{ $newpassword }}</p>
        <p>Full Name: {{ $user->first_name }}, {{ $user->last_name }}</p>
        <p>Created Date: {{ $datetoday }}</p>
        <p>Please log in to your account as soon as possible. For security reasons, we recommend changing your password upon your first login.</p>
        <p>Welcome aboard, and we wish you success on your journey with us!</p>
    @endif
    
</body>
</html>