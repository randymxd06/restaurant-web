<?php

namespace Database\Seeders;

use App\Models\LivingRoom;
use App\Models\LivinRoom;
use Illuminate\Database\Seeder;

class LivinRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LivingRoom::factory()->count(3)->create();
    }
}
