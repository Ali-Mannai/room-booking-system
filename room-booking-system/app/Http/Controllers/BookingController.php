<?php
namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
use App\Mail\BookingCancelled;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->with('room')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date|after:today',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $request->room_id,
            'date' => $request->date,
        ]);

        Mail::to(auth()->user()->email)->send(new BookingConfirmed($booking));
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        Mail::to(auth()->user()->email)->send(new BookingCancelled($booking));
        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully.');
    }
}