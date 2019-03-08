<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToFacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facts', function (Blueprint $table) {
            $table->string('public_date',20)->nullable();
            $table->integer('like');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facts', function (Blueprint $table) {
            $table->dropColumn('public_date');
            $table->dropColumn('like');
        });
    }
}
