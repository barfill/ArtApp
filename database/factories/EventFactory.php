<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use App\Models\Speaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('2000-01-01', '2030-12-31'),
            'description' => $this->faker->paragraph(3),
            //***To rozwiązanie tworzy nowe rekordy w tabelach 'speakers' i 'locations' za każdym razem, gdy tworzysz nowy event.
            // 'speaker_id' => Speaker::factory(),
            // 'location_id' => Location::factory()
            //***To rozwiązanie przypisuje istniejące rekordy do eventu. Musisz mieć już jakieś rekordy w tabelach 'speakers' i 'locations' a jeżeli nie to stworzy nowe instancje.
            'speaker_id' => Speaker::inRandomOrder()->first()->id ?? Speaker::factory()->create()->id,
            'location_id' => Location::inRandomOrder()->first()->id ?? Location::factory()->create()->id
        ];
    }
}
