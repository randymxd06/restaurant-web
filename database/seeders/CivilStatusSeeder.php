<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $civilStatus = ['Soltero(a)', 'Casado(a)', 'Union Libre', 'Viudo(a)'];

        foreach ($civilStatus as $civilStatu){

            CivilStatus::create([

                'description' => $civilStatu,
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

        }

    }
}
