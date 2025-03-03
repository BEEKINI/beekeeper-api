<?php

namespace Database\Seeders;

use App\Models\HoneyProd;
use Illuminate\Database\Seeder;

class HoneyProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HoneyProd::factory(10)->create();
    }
}
