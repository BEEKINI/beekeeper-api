<?php

namespace Database\Seeders;

use App\Models\Swarm;
use Illuminate\Database\Seeder;

class SwarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Swarm::factory(10)->create();
    }
}
