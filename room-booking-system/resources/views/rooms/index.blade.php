@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rooms</h1>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Capacity</th>
                    @if(auth()->user()->isAdmin())
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->capacity }}</td>
                        @if(auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection