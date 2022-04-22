<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nationalities = ['Dominicano(a)', 'Venezolano(a)', 'Colombiano(a)', 'Mexicano(a)', 'Peruano(a)'];

        foreach ($nationalities as $nationality){

            Nationality::create([
                'name' => $nationality,
                'description' => 'Estos son datos de prueba realizados por Randy',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }
}
