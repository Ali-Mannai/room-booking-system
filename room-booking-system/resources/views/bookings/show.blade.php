@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Booking Details</h1>
        <p>Room: {{ $booking->room->name }}</p>
        <p>Date: {{ $booking->date }}</p>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to Bookings</a>
    </div>
@endsection