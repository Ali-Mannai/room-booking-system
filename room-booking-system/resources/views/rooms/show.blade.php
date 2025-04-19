@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $room->name }}</h1>
        <p>Capacity: {{ $room->capacity }}</p>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back to Rooms</a>
    </div>
@endsection