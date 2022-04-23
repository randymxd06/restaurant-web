<?php

namespace Database\Seeders;

use App\Models\UnitsMeasurement;
use Illuminate\Database\Seeder;

class UnitsMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitsMeasurement::factory()->count(5)->create();
    }
}
