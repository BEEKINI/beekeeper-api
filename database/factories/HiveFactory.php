<?php

namespace Database\Factories;

use App\Models\Apiary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'apiary_id' => Apiary::inRandomOrder()->first()->id,
            'name' => 'Hive ' . $this->faker->word(),
            'installation_date' => $this->faker->date(),
            'in_use' => $this->faker->boolean(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
