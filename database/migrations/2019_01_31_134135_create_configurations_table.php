<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_decreto');
            $table->date('date');
            $table->string('name');
            $table->string('code_L');
            $table->string('description_L');
            $table->boolean('type_L');
            $table->string('TipoConvocatoria');
            $table->string('Moneda');
            $table->boolean('Etapa');
            $table->boolean('contract');
            $table->boolean('EstadoPublicidadOfertas');
            $table->integer('EstimacionBase');
            $table->text('FuenteFinanciamiento');
            $table->integer('MontoEstimado');
            $table->boolean('EsRenovable');
            $table->text('JustificaRenovacion');
            $table->text('Observaciones');
            $table->boolean('DuracionContrato');
            $table->string('TiempoContrato');
            $table->string('NombreResponsablePago');
            $table->string('EmailResponsablePago');
            $table->string('NombreResponsableContrato');
            $table->string('EmailResponsableContrato');
            $table->integer('TelefonoResponsableContrato');
            $table->boolean('ProhibicionSubcontrato');
            $table->string('estado');
            $table->integer('user_id_creador')->unsigned();
            $table->foreign('user_id_creador')->references('id')->on('users');
            $table->integer('user_id_editor');
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
        Schema::dropIfExists('configurations');
    }
}
