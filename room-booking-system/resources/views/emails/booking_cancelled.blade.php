<!DOCTYPE html>
<html>
<head>
    <title>Booking Cancelled</title>
</head>
<body>
    <h1>Booking Cancelled</h1>
    <p>Dear {{ $booking->user->name }},</p>
    <p>Your booking for {{ $booking->room->name }} on {{ $booking->date }} has been cancelled.</p>
    <p>Thank you for using our Room Booking System!</p>
</body>
</html>