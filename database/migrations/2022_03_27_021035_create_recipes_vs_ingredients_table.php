<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesVsIngredientsTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('recipes_vs_ingredients', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('ingredients_id');
            $table->foreign('ingredients_id')->references('id')->on('ingredients')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('unit_measurement_id');
            $table->foreign('unit_measurement_id')->references('id')->on('units_measurement')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('recipes_vs_ingredients');
    }
}
