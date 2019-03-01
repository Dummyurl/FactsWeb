<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteprofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('sitename',255)->nullable();
            $table->string('siteslogan',255)->nullable();
            $table->string('sikiptocontent',255)->nullable();
            $table->string('addressone',255)->nullable();
            $table->string('addresstwo',255)->nullable();
            $table->string('location',255)->nullable();
            $table->string('mobileno',255)->nullable();
            $table->string('phoneone',255)->nullable();
            $table->string('phonetwo',255)->nullable();
            $table->string('copytext',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('owner',255)->nullable();
            $table->string('metatitle',255)->nullable();
            $table->string('metadescription',255)->nullable();
            $table->string('logo',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siteprofiles');
    }
}
