<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey', function (Blueprint $table) {
            $table->integer('survey_id');
            $table->string('srvey_start_date',20)->nullable();
            $table->string('srvey_end_date',20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey', function (Blueprint $table) {
            $table->dropColumn('survey_id');
            $table->dropColumn('srvey_start_date');
            $table->dropColumn('srvey_end_date');
        });
    }
}
