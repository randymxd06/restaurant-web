<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTypesTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('employee_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->text('description');
            $table->unsignedBigInteger('work_area_id');
            $table->foreign('work_area_id')->references('id')->on('work_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('employee_types');
    }

}
