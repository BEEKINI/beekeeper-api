<?php

namespace Database\Factories;

use App\Models\Hive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Swarm>
 */
class SwarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hive_id' => Hive::inRandomOrder()->first()->id,
            'name' => 'Swarm ' . $this->faker->word(),
            'is_alive' => $this->faker->boolean(),
        ];
    }
}
