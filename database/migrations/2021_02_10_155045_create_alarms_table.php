<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained();
            $table->dateTime('timestamp');
            $table->dateTime('event_date')->nullable();
            $table->dateTime('resolution_date')->nullable();
            $table->time('duration')->nullable();
            $table->string('description')->nullable();
            $table->string('object')->nullable();
            $table->string('navigation_menu')->nullable();
            $table->string('value')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('alarms');
    }
}
