<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('warehouse_type_id');
            $table->foreign('warehouse_type_id')->references('id')->on('warehouse_type')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
    }

}
