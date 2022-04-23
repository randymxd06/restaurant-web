<?php

namespace Database\Seeders;

use App\Models\IngredientsStock;
use Illuminate\Database\Seeder;

class IngredientsStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IngredientsStock::factory()->count(5)->create();
    }
}
