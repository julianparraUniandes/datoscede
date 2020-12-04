<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microdata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_metadata');
            $table->string('nombre');
            $table->string('nombre_en');
            $table->string('path');
            $table->string('linkExterno');
            $table->integer('orden');
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
        Schema::dropIfExists('microdata');
    }
}
