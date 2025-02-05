<?php

namespace Database\Factories;

use App\Models\Swarm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Darwin>
 */
class DarwinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'swarm_parent_id' => Swarm::inRandomOrder()->first()->id,
            'swarm_id' => Swarm::inRandomOrder()->first()->id,
            'swarm_origin_id' => Swarm::inRandomOrder()->first()->id,
        ];
    }
}
