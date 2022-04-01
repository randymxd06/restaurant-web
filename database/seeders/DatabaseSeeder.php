<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\OrderType::factory(3)->create();
         \App\Models\User::factory(3)->create();
         \App\Models\LivingRoom::factory(3)->create();
         \App\Models\Table::factory(3)->create();
         \App\Models\ProductCategory::factory(3)->create();
         \App\Models\Box::factory(3)->create();
         \App\Models\Sex::factory(3)->create();
         \App\Models\CivilStatus::factory(3)->create();
         \App\Models\Nationality::factory(3)->create();
         \App\Models\CustomerType::factory(3)->create();
         \App\Models\Customer::factory(3)->create();
    }
}
