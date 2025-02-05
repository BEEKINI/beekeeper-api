<?php

namespace Database\Seeders;

use App\Models\Apiary;
use Illuminate\Database\Seeder;

class ApiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apiary::factory(10)->create();
    }
}
