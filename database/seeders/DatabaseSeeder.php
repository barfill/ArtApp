<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SpeakerSeeder::class,
            LocationSeeder::class,
            EventSeeder::class //Event ostatni, aby mógł mieć referencje do Location i Speaker
        ]);
    }
}
