<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurvyFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('question')->unllable();
            $table->boolean('status')->default(0);
            $table->string('createdby');
            $table->integer('question_id');
            $table->integer('survey_id');
            $table->string('question_type',20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_forms');
    }
}
