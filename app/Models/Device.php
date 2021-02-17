<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Device extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $fillable = [
        "api_token",
        "nome",
        "identificador",
        "trial_host",
        "noip_host",
        "cliente",
        "descricao",
        "data_ativacao",
        "vazao_acumulada",
        "acionamentos_acumulado",
        "tempo_compressor_acumulado",
        "status_compressor",
        "status_nivel",
        "status_liga_sistema",
        "status_bomba_transferencia"
    ];

    protected $dates = [
        'data_ativacao',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function daily_logs()
    {
        return $this->hasMany(DailyLog::class)->latest();
    }

    public function real_times()
    {
        return $this->hasMany(RealTime::class)->latest();
    }

    public function alarms()
    {
        return $this->hasMany(Alarms::class)->latest();
    }

}
