<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialRelacionadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_relacionado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_metadata');
            $table->string('name');
            $table->string('name_en');
            $table->string('link');
            $table->string('path');
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
        Schema::dropIfExists('material_relacionado');
    }
}
