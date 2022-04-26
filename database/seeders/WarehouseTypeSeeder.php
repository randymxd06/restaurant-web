<?php

namespace Database\Seeders;

use App\Models\WarehouseType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WarehouseTypeSeeder extends Seeder
{

    public function run()
    {

        $warehouses = ['Verduras', 'Lacteos', 'Frutas', 'Congeladores', 'Secos', 'Otros'];

        foreach ($warehouses as $warehouse){

            WarehouseType::create([
                'name' => $warehouse,
                'description' => 'Estos son datos de prueba generados.',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }

    }

}
