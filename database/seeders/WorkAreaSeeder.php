<?php

namespace Database\Seeders;

use App\Models\WorkArea;
use Illuminate\Database\Seeder;

class WorkAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkArea::factory()->count(5)->create();
    }
}
