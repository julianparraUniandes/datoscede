<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('tipo_user');
            $table->string('programa');
            $table->string('doble_programa');
            $table->string('nombre_profesor');
            $table->string('mail_auth');
            $table->text('descripcion');
            $table->integer('metadata_id');
            $table->integer('user_id');
            $table->string('nombre_metadata');
            $table->integer('estado');
            $table->datetime('fecha_solicitud');
            $table->string('uuid');
            $table->datetime('fecha_respuesta')->nullable();
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
        Schema::dropIfExists('autorizations');
    }
}
