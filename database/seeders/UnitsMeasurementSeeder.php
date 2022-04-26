<?php

namespace Database\Seeders;

use App\Models\UnitsMeasurement;
use Illuminate\Database\Seeder;

class UnitsMeasurementSeeder extends Seeder
{

    public function run()
    {
        UnitsMeasurement::factory()->count(5)->create();
    }

}
