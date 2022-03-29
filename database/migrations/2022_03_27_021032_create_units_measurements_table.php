<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsMeasurementsTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('units_measurement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->char('symbol');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('units_measurement');
    }

}
