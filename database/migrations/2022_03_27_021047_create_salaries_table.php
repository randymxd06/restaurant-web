<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_type_id');
            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('cascade')->onUpdate('cascade');
            $table->double('salary');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('salaries');
    }

}
