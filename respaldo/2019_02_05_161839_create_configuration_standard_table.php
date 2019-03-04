<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationStandardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration_standard', function (Blueprint $table) {
            $table->increments('id');
            $table->interger('porcentaje');
             $table->text('evaluaciondescripcion');
            $table->integer('configuration_id')->unsigned();
            $table->foreign('configuration_id')->references('id')->on('configurations');
            $table->integer('standard_id')->unsigned();
            $table->foreign('standard_id')->references('id')->on('standards');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuration_standard');
    }
}
