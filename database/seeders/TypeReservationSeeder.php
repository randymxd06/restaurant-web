<?php

namespace Database\Seeders;

use App\Models\TypeReservation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TypeReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $typeReservations = ['Evento', 'Cita', 'Reunion', 'Cumpleaños'];

        foreach ($typeReservations as $typeReservation){

            TypeReservation::create([
                'name' => $typeReservation,
                'description' => 'Estos son datos de prueba generador por Randy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }
}
