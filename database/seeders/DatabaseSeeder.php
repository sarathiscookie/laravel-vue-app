<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();

        Bookable::factory(100)->create();

        Bookable::all()->each(function (Bookable $bookable) {
            $booking = Booking::factory()->make();
            $bookings = collect([$booking]);

            for ($i = 0; $i < random_int(1, 20); $i++) {
                $from = (clone $booking->to->addDays(random_int(1, 14)));

                $to = (clone $from)->addDays(random_int(0, 14));

                $booking = Booking::make([
                    'from' => $from,
                    'to' => $to
                ]);

                $bookings->push($booking);
            }
            
            $bookable->bookings()->saveMany($bookings);
        });

        Bookable::all()->each(function (Bookable $bookable) {
            $reviews = Review::factory(5)->make();
            $bookable->reviews()->saveMany($reviews);
        });
        
    }
}
