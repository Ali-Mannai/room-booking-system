@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book a Room</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="room_id">Room</label>
                <select name="room_id" id="room_id" class="form-control" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }} (Capacity: {{ $room->capacity }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Book</button>
        </form>
    </div>
@endsection