<?php

namespace Database\Seeders;

use App\Models\Bookable;
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
    }
}
