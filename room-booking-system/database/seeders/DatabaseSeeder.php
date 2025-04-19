<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@roombooking.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@roombooking.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        Room::create(['name' => 'Room 1', 'capacity' => 10]);
        Room::create(['name' => 'Room 2', 'capacity' => 20]);
        Room::create(['name' => 'Room 3', 'capacity' => 15]);

        Booking::create([
            'user_id' => 1,
            'room_id' => 1,
            'date' => '2025-04-20',
        ]);
        Booking::create([
            'user_id' => 2,
            'room_id' => 2,
            'date' => '2025-04-21',
        ]);
    }
}