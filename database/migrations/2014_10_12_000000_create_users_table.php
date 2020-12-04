<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('company')->nullable();
            $table->string('companyKind')->nullable();
            $table->string('country')->nullable();
            $table->string('depto')->nullable();
            $table->string('city')->nullable();
            $table->longText('token')->nullable();
            $table->string('facultad')->nullable();
            $table->string('tipo_usr')->nullable();
            $table->string('programa')->nullable();
            $table->string('doble_programa')->nullable();
            $table->boolean('full_data')->nullable();;
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
        Schema::dropIfExists('users');
    }
}
