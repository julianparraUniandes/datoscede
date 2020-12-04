<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link_uniandes', 100);
            $table->string('link_cede', 100);
            $table->string('footer_direccion_1', 150);
            $table->string('footer_direccion_2', 150);
            $table->string('footer_telefono_1', 50);
            $table->string('footer_telefono_2', 50);
            $table->text('banner_home');
            $table->text('banner_home_texto');
            $table->text('banner_home_texto_en');
            $table->text('banner_catalogo');
            $table->text('banner_db_detalle');
            $table->text('banner_login');
            $table->text('banner_registro');
            $table->text('texto_salas_detalle_metadato');
            $table->text('texto_salas_detalle_metadato_en');
            $table->text('texto_inconsistencias');
            $table->text('texto_inconsistencias_en');
            $table->text('texto_restringidas_externos');
            $table->text('texto_restringidas_externos_en');
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
        Schema::dropIfExists('parametros');
    }
}
