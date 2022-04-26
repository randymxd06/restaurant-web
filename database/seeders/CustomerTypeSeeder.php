<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{

    public function run()
    {

        $customerTypes = ['Cliente normal', 'Cliente concurrente', 'Cliente estrella'];

        foreach ($customerTypes as $customerType){

            CustomerType::create([
                'name' => $customerType,
                'description' => 'Esta es una descripcion de prueba.',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }

    }

}
