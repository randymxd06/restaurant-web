<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEntitiesToAddBirthDateColumns extends Migration
{

    public function up()
    {
        Schema::table('entities', function (Blueprint $table) {
            $table->date('birth_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entities');
    }

}
