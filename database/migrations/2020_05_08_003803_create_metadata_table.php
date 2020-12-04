<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_en');
            $table->integer('ano_desde');
            $table->integer('ano_hasta');
            $table->string('ano_texto');
            $table->integer('id_tema');
            $table->string('pais');
            $table->text('cobertura');
            $table->string('periodicidad');
            $table->string('fuente');
            $table->string('patrocinador')->nullable();
            $table->text('keywords');
            $table->text('descripcion');
            $table->text('descripcion_en');
            $table->integer('id_tos');
            $table->integer('vistas')->default('0');
            $table->integer('actualizable');
            $table->string('version')->default('1');
            $table->date('fecha_actualizacion')->nullable();
            $table->integer('publicada');
            $table->text('slug');
            $table->text('busqueda');
            $table->timestamp('last_count_increased_at');
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
        Schema::dropIfExists('metadata');
    }
}
