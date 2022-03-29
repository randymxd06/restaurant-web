<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('iso_code');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }

}
