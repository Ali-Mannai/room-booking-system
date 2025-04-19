@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Booking</h1>
        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="room_id" class="form-label">Room</label>
                <select name="room_id" id="room_id" class="form-control" required>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $booking->date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>
@endsection