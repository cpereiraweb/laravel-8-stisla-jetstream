<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained();
            $table->dateTime('timestamp');
            $table->smallInteger('level')->nullable();
            $table->smallInteger('compressor_status')->nullable();
            $table->smallInteger('transfer_pump_status')->nullable();
            $table->smallInteger('system_status')->nullable();
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
        Schema::dropIfExists('real_times');
    }
}
