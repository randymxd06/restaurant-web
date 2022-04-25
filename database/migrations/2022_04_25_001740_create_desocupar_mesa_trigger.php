<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDesocuparMesaTrigger extends Migration
{

    public function up()
    {
        DB::unprepared('
          CREATE TRIGGER desocuparMesa BEFORE UPDATE ON orders FOR EACH ROW UPDATE tables SET status=1 WHERE id = NEW.table_id
        ');
    }

    public function down()
    {

    }

}
