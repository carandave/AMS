<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification Request Download Thesis Email</title>
</head>
<body>

    @if($status == "Approved")
        <h1>Dear {{ $user->first_name }},</h1>
        <p>We are pleased to inform you that your request to download the thesis titled. <span style="font-weight: bold">{{ $title }}</span> has been approved. You may now access and download the document using the link below:</p>
        <a href="{{ url('storage/' . $linkfile) }}">[Download Link]</a>
        <br>
        <p>If you encounter any issues while downloading, please do not hesitate to contact us.</p>
        <p>Thank you, and happy researching!</p>
        <br>
        <p>Best regards,</p>
        <p>PBTS AMS</p>
    @endif

    @if($status == "Denied")
        <h1>Dear {{ $user->first_name }},</h1>
        <p>We regret to inform you that your request to download the thesis titled <span style="font-weight: bold">{{ $title }}</span> has been denied.</p>
        <p>If you believe this was an error or need further clarification, please feel free to contact us.</p>
        <p>Thank you for your understanding.</p>
        <br>
        <p>Best regards,</p>
        <p>PBTS AMS</p>
    @endif

    {{-- @if($status == "Denied")
        <h1>Dear {{ $user->first_name }},</h1>
        <p>We regret to inform you that your registration for PBTS Thesis Archive has been {{ $status }} at this time..</p>
        <p>Full Name: {{ $user->first_name }}, {{ $user->last_name }}</p>
        <p>Status: {{ $status }}</p>
        <p>{{ $status }} Date: {{ $datetoday }}</p>
        <p>If you would like more information regarding this decision or wish to appeal, please contact us.</p>
        <p>We appreciate your interest in out PBTS Thesis Archive, and we encourage you to apply again in the future.</p>
    @endif --}}

</body>
</html>