<?php

namespace Database\Seeders;

use App\Models\Swarm;
use App\Models\SwarmState;
use Illuminate\Database\Seeder;

class SwarmStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SwarmState::factory(100)->create();
    }
}
