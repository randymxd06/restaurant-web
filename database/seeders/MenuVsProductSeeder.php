<?php

namespace Database\Seeders;

use App\Models\MenuVsProduct;
use Illuminate\Database\Seeder;

class MenuVsProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuVsProduct::factory()->count(5)->create();
    }
}
