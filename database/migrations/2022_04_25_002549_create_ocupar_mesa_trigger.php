<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOcuparMesaTrigger extends Migration
{

    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER ocuparMesa AFTER INSERT ON orders FOR EACH ROW UPDATE tables SET status=0 WHERE id = NEW.table_id
        ');
    }

    public function down()
    {

    }

}
