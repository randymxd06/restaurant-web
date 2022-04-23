<?php

namespace Database\Seeders;

use App\Models\Sex;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sexs = ['Masculino', 'Femenino'];

        foreach ($sexs as $sex){

            Sex::create([

                'name' => $sex,
                'symbol' => $sex.' Symbol',
                'description' => 'Estos son datos de prueba generados por Randy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

        }

    }
}
