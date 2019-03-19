<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('question')->unllable();
            $table->boolean('day_poll')->default(0);
            $table->string('poll_date',20)->nullable();
            $table->string('question_type',20)->nullable();
            $table->boolean('status')->default(0);
            $table->string('createdby');
            $table->ipAddress('visitor');
            $table->macAddress('device');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
}
