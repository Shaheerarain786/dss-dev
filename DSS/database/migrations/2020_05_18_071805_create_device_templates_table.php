<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template_type');
            $table->integer('device_id');
            $table->string('logo')->nullable();
            $table->longText('ticker')->nullable();
            $table->string('video')->nullable();
            $table->string('schedule_from')->nullable();
            $table->string('schedule_to')->nullable();
            $table->boolean('is_urgent')->default(false);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('device_templates');
    }
}
