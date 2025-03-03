<?php

namespace Database\Factories;

use App\Models\Apiary;
use App\Models\HoneyProd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HoneyProd>
 */
class HoneyProdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => $this->faker->randomFloat(2, 0, 100),
            'apiary_id' => Apiary::inRandomOrder()->first()->id,
        ];
    }
}
