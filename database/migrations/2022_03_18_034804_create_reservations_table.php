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
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->on('customers')->references('id');
            $table->unsignedBigInteger('type_reservations_id');
            $table->foreign('type_reservations_id')->references('id')->on('type_reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('living_room_id');
            $table->foreign('living_room_id')->references('id')->on('living_rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->date('reservation_date');
            $table->time('reservation_time');
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
