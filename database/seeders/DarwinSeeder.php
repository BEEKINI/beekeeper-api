<?php

namespace Database\Seeders;

use App\Models\Darwin;
use Illuminate\Database\Seeder;

class DarwinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Darwin::factory(10)->create();
    }
}
