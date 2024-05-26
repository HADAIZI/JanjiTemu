@component('mail::message')
# Privilege Notification

Hello {{ $user }},

@switch($privilege)
    @case('moderator')
        You have been assigned the role of Moderator in the group. Congratulations!
        @break

    @case('member')
        Your privilege has been set into member
        @break

    @case('master')
        You have been designated as the Master of the group. Great responsibility comes with great power!
        @break

    @default
        You have received a special privilege in the group. Check it out!
@endswitch

Thank you for being a part of our community.

Regards,
{{ $master }}
@endcomponent
