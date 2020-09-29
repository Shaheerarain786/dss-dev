<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('device_group_id')->nullable();
            $table->string('device_name')->nullable();
            $table->string('device_uid')->nullable();
            $table->string('device_no')->nullable();
            $table->string('device_ip')->nullable();
            $table->string('device_model')->nullable();
            $table->string('device_description')->nullable();
            $table->string('device_screen_height')->nullable();
            $table->string('device_screen_width')->nullable();
            $table->string('device_storage_memory')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
