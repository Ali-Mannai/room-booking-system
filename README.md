Mini Room Booking System
Overview
The Mini Room Booking System is a web application built with Laravel 12.x, designed to allow users to book rooms and administrators to manage room availability. Key features include user authentication, room management, booking creation/cancellation, and email notifications for booking confirmations and cancellations.
Features

User Authentication: Register, login, and logout using Laravel Breeze.
Room Management: Admins can create, edit, and delete rooms.
Booking System: Users can book rooms for specific dates and cancel bookings.
Email Notifications: Sends confirmation and cancellation emails via Mailtrap.
Responsive Design: Styled with Tailwind CSS for a modern UI.

Requirements

PHP >= 8.2
Composer
Node.js and npm
SQLite (used as the database)
Mailtrap account for email notifications

Installation
1. Clone the Repository or Create the Project
If starting from scratch:
cd ~/Desktop/room-booking-system
composer create-project laravel/laravel room-booking-system
cd room-booking-system

2. Configure Environment

Copy .env.example to .env:
cp .env.example .env


Update .env with the following:
APP_NAME="Room Booking System"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=/c/Users/MANNAI\ ALI/Desktop/room-booking-system/room-booking-system/database/database.sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<your-mailtrap-username>
MAIL_PASSWORD=<your-mailtrap-password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@roombooking.com"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"


Generate the application key:
php artisan key:generate


Create the SQLite database:
touch database/database.sqlite
chmod 775 database/database.sqlite



3. Install Dependencies

Install PHP dependencies:
composer install


Install Laravel Breeze for authentication:
composer require laravel/breeze --dev
php artisan breeze:install blade


Install Node.js dependencies and compile assets:
npm install
npm run dev



4. Set Up Tailwind CSS

Install Tailwind CSS:
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init


Update tailwind.config.js:
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}


Update resources/css/app.css:
@tailwind base;
@tailwind components;
@tailwind utilities;


Compile assets:
npm run dev



5. Apply Project Code
Add the following files (refer to project documentation or source code for full details):

Models: app/Models/Room.php, Booking.php, update User.php (add is_admin).
Migrations: Update users table, add rooms and bookings tables.
Controllers: app/Http/Controllers/RoomController.php, BookingController.php.
Views: resources/views/rooms/index.blade.php, bookings/index.blade.php, etc.
Mailables: app/Mail/BookingConfirmed.php, BookingCancelled.php.
Seeders: database/seeders/DatabaseSeeder.php.
Routes: Update routes/web.php.
Middleware: Create app/Http/Middleware/Admin.php and register in app/Http/Kernel.php.

Example: Register Admin middleware:
php artisan make:middleware Admin

Edit app/Http/Kernel.php, add to $routeMiddleware:
'admin' => \App\Http\Middleware\Admin::class,

6. Run Migrations and Seeders
php artisan migrate:fresh --seed

7. Start the Server
php artisan serve

Access the application at http://localhost:8000.
Usage

Register/Login:
Admin: admin@roombooking.com / password
User: user@roombooking.com / password


User Actions:
View available rooms.
Book or cancel a room for a specific date.


Admin Actions:
Create, edit, or delete rooms.


Email Notifications:
Check Mailtrap inbox for booking confirmation/cancellation emails.



Troubleshooting

.env Errors:

Verify .env syntax:
cat -vet .env
php -r "var_dump(parse_ini_file('.env'));"


Ensure no extra whitespace in DB_DATABASE.



Missing Files:

Check app/Http/Kernel.php:
ls app/Http/Kernel.php


Recreate project if incomplete:
composer create-project laravel/laravel room-booking-system




Mailtrap Issues:

Test email sending:
php artisan tinker
Mail::raw('Test email', function($message) { $message->to('test@example.com')->subject('Test'); });





Contributing
Contributions are welcome! Please submit a pull request or open an issue for suggestions or bug reports.
License
This project is open-source and licensed under the MIT License.
