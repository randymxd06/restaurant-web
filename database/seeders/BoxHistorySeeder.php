<?php

namespace Database\Seeders;

use App\Models\BoxHistory;
use Illuminate\Database\Seeder;

class BoxHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BoxHistory::factory()->count(5)->create();
    }
}
