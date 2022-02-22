<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('living_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('tables_capacity');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('living_rooms');
    }
}
