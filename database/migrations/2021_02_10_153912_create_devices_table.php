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
            $table->id();
            $table->string('api_token')->nullable();
            $table->string('nome');
            $table->string('identificador')->nullable();
            $table->string('trial_host')->nullable();
            $table->string('noip_host')->nullable();
            $table->string('cliente')->nullable();
            $table->string('descricao')->nullable();
            $table->date('data_ativacao')->nullable();
            $table->decimal('vazao_acumulada', 10, 2)->nullable();
            $table->decimal('acionamentos_acumulado', 10, 2)->nullable();
            $table->decimal('tempo_compressor_acumulado', 10, 2)->nullable();
            $table->smallInteger('status_compressor')->default(0)->nullable();
            $table->smallInteger('status_nivel')->default(0)->nullable();
            $table->smallInteger('status_liga_sistema')->default(0)->nullable();
            $table->smallInteger('status_bomba_transferencia')->default(0)->nullable();
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
        Schema::dropIfExists('devices');
    }
}
