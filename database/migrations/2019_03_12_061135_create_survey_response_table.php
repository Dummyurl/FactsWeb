<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_response', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->ipAddress('visitor');
            $table->macAddress('device');
            $table->integer('question_id');
            $table->integer('option_id');
            $table->string('poll_date',20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_response');
    }
}
