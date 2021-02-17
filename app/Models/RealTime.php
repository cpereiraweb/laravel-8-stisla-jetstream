<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealTime extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "device_id",
        "timestamp",
        "level",
        "compressor_status",
        "transfer_pump_status",
        "system_status",
    ];
}
