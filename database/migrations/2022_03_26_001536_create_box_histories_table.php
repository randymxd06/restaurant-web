<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxHistoriesTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('boxes_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('box_id');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade')->onUpdate('cascade');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('boxes_history');
    }

}
