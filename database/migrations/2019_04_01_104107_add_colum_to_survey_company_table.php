<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToSurveyCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_companies', function (Blueprint $table) {
            $table->text('shortdesc')->unllable();
            $table->string('image')->unllable();
            $table->longText('description')->unllable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_companies', function (Blueprint $table) {
            $table->dropColumn('shortdesc');
            $table->dropColumn('image');
            $table->dropColumn('description');
        });
    }
}
