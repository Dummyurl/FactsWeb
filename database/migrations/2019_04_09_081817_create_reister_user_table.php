<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReisterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('email',255)->nullable();
            $table->string('name',255)->nullable();
            $table->longText('photo_url',255)->nullable();
            $table->string('district',255)->nullable();
            $table->string('province',255)->nullable();
            $table->string('ward',255)->nullable();
            $table->string('latitude',255)->nullable();
            $table->string('longitude',255)->nullable();
            $table->string('birth_year',20)->nullable();
            $table->string('provider',60)->nullable();
            $table->string('gender',255)->nullable();
            $table->string('municipality',255)->nullable();
            $table->string('street',255)->nullable();
            $table->longText('token')->unllable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_users');
    }
}

