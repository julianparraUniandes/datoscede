<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInconsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inconsistencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_metadata');
            $table->integer('id_user');
            $table->string('user_name');
            $table->string('user_lastname');
            $table->string('user_email');
            $table->string('tipo_usr');
            $table->string('nombre_metadata');
            $table->string('version_metadata');
            $table->text('texto');            
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
        Schema::dropIfExists('inconsistencias');
    }
}
