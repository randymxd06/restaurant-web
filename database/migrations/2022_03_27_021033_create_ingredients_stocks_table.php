<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('ingredients_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('unit_measurement_id');
            $table->foreign('unit_measurement_id')->references('id')->on('units_measurement')->onDelete('cascade')->onUpdate('cascade');
            $table->date('arrival_date');
            $table->date('expiration_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('ingredients_stock');
    }

}
