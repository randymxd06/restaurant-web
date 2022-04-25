<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateLivingroomChangeStatusTrigger extends Migration
{

    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER estadoMesas AFTER UPDATE ON living_rooms FOR EACH ROW UPDATE tables SET status=NEW.status WHERE living_room_id = NEW.id
        ');
    }

    public function down()
    {

    }

}
