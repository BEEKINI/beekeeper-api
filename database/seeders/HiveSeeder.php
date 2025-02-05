<?php

namespace Database\Seeders;

use App\Models\Hive;
use Illuminate\Database\Seeder;

class HiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hive::factory(10)->create();
    }
}
