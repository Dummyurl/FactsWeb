<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtrasPassportFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $blueprint) {
            $blueprint->string('device_id',255)->nullable();
            $blueprint->string('photo',255)->nullable();
            $blueprint->string('address',255)->nullable();
            $blueprint->string('province',255)->nullable();
            $blueprint->string('ward',255)->nullable();
            $blueprint->string('lat',255)->nullable();
            $blueprint->string('longitude',255)->nullable();
            $blueprint->string('dob',255)->nullable();
            $blueprint->string('education',255)->nullable();
            $blueprint->string('gender',255)->nullable();
            $blueprint->string('municipality',255)->nullable();
            $blueprint->string('street',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $blueprint) {
            $blueprint->removeColumn('device_id');
            $blueprint->removeColumn('photo')->nullable();
            $blueprint->removeColumn('address')->nullable();
            $blueprint->removeColumn('province')->nullable();
            $blueprint->removeColumn('ward')->nullable();
            $blueprint->removeColumn('lat')->nullable();
            $blueprint->removeColumn('longitude')->nullable();
            $blueprint->removeColumn('dob')->nullable();
            $blueprint->removeColumn('education')->nullable();
            $blueprint->removeColumn('gender');
            $blueprint->removeColumn('municipality')->nullable();
            $blueprint->removeColumn('street')->nullable();
        });
    }
}
