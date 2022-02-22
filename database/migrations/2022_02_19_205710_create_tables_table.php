<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_capacity');
            $table->unsignedBigInteger('living_room_id');
            $table->foreign('living_room_id')->references('id')->on('living_rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
