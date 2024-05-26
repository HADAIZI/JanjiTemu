<!-- privilege_notification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privilege Notification</title>
</head>
<body>
    <h1>Privilege Notification</h1>

    <p>Hello {{ $user }},</p>

    @switch($privilege->role)
        @case('moderator')
            <p>You have been assigned the role of Moderator in the group. Congratulations!</p>
            @break

        @case('member')
            <p>Your privilege has been set into member.</p>
            @break

        @case('master')
            <p>You have been designated as the Master of the group. Great responsibility comes with great power!</p>
            @break

        @default
            <p>You have received a special privilege in the group. Check it out!</p>
    @endswitch

    <p>Thank you for being a part of our community.</p>

    <p>Regards, {{ $master }}</p>
</body>
</html>
