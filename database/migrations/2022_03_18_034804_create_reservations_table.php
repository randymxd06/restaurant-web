<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{

    public function up()
    {

        Schema::disableForeignKeyConstraints();

        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('type_reservations_id');
            $table->foreign('type_reservations_id')->references('id')->on('type_reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('living_room_id');
            $table->foreign('living_room_id')->references('id')->on('living_rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('date_time');
            $table->unsignedBigInteger('number_people');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }

}
