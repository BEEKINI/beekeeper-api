<?php

namespace Database\Factories;

use App\Models\Swarm;
use App\Models\SwarmState;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SwarmState>
 */
class SwarmStateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $states = [
            'calm',
            'foraging',
            'swarming_imminent',
            'swarming',
            'orphaned',
            'thermal_stress',
            'hibernation',
            'disease',
            'empty',
        ];

        $state = Arr::random($states);

        $temperature = $this->generateTemperature($state);
        $humidity = $this->generateHumidity($state);
        $weight = $this->generateWeight($state);
        $sound_level = $this->generateSoundLevel($state);
        $sound_signature = $this->generateSoundSignature($state);
        $activity_level = $this->generateActivityLevel($state);
        $alert = $this->generateAlert($state);

        return [
            'swarm_id' => Swarm::inRandomOrder()->first()->id,
            'temperature' => $temperature,
            'humidity' => $humidity,
            'weight' => $weight,
            'sound_level' => $sound_level,
            'sound_signature' => $sound_signature,
            'vibration_level' => $this->faker->randomFloat(2, 0.1, 2.5),
            'co2_level' => $this->faker->randomFloat(2, 300, 500),
            'activity_level' => $activity_level,
            'detected_state' => $state,
            'alert' => $alert,
        ];
    }

    private function generateTemperature(string $state): float
    {
        return match ($state) {
            'hibernation' => $this->faker->randomFloat(1, 25, 30),
            'thermal_stress' => $this->faker->randomFloat(1, 37, 42),
            default => $this->faker->randomFloat(1, 33, 36),
        };
    }

    private function generateHumidity(string $state): float
    {
        return match ($state) {
            'hibernation' => $this->faker->randomFloat(1, 60, 75),
            'thermal_stress' => $this->faker->randomFloat(1, 70, 85),
            default => $this->faker->randomFloat(1, 50, 65),
        };
    }

    private function generateWeight(string $state): float
    {
        return match ($state) {
            'swarming' => $this->faker->randomFloat(1, 5, 10),
            'empty' => $this->faker->randomFloat(1, 0, 2),
            default => $this->faker->randomFloat(1, 25, 35),
        };
    }

    private function generateSoundLevel(string $state): float
    {
        return match ($state) {
            'calm' => $this->faker->randomFloat(1, 40, 50),
            'foraging' => $this->faker->randomFloat(1, 55, 65),
            'swarming_imminent' => $this->faker->randomFloat(1, 60, 70),
            'swarming' => $this->faker->randomFloat(1, 45, 55),
            'orphaned' => $this->faker->randomFloat(1, 50, 60),
            default => $this->faker->randomFloat(1, 45, 65),
        };
    }

    private function generateSoundSignature(string $state): string
    {
        return match ($state) {
            'calm' => 'light_buzzing',
            'foraging' => 'intense_activity',
            'swarming_imminent' => 'swarm_signals',
            'swarming' => 'noise_drop',
            'orphaned' => 'plaintive_noise',
            'thermal_stress' => 'jerky_buzzing',
            'hibernation' => 'almost_silent',
            'disease' => 'disturbed_activity',
            'empty' => 'complete_silence',
        };
    }

    private function generateActivityLevel(string $state): string
    {
        return match ($state) {
            'calm', 'hibernation', 'empty' => 'low',
            'foraging', 'swarming_imminent' => 'high',
            default => 'normal',
        };
    }

    private function generateAlert(string $state): bool
    {
        return in_array($state, [
            'swarming_imminent',
            'swarming',
            'orphaned',
            'thermal_stress',
            'disease',
            'empty',
        ]);
    }
}