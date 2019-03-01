<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title',255)->nullable();
            $table->text('shortdesc')->unllable();
            $table->string('image')->unllable();
            $table->longText('description')->unllable();
            $table->boolean('status')->default(0);
            $table->ipAddress('visitor');
            $table->string('location',255)->nullable();
            $table->string('macaddress',255)->nullable();
            $table->string('country',255)->nullable();
            $table->string('order',10);
            $table->year('birth_year');
            $table->string('createdby');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
