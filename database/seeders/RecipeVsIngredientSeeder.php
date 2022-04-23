<?php

namespace Database\Seeders;

use App\Models\RecipeVsIngredient;
use Illuminate\Database\Seeder;

class RecipeVsIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeVsIngredient::factory()->count(5)->create();
    }
}
