<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed</title>
</head>
<body>
    <h1>Booking Confirmed</h1>
    <p>Dear {{ $booking->user->name }},</p>
    <p>Your booking for {{ $booking->room->name }} on {{ $booking->date }} has been confirmed.</p>
    <p>Thank you for using our Room Booking System!</p>
</body>
</html>