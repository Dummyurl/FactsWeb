<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->text('shortdesc')->unllable();
            $table->string('image')->unllable();
            $table->longText('description')->unllable();
            $table->string('order',10);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('services');
    }
}
