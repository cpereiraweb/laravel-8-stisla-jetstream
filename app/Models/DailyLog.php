<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "device_id",
        "timestamp",
        "triggers",
        "flow",
        "compressor_time",
    ];
}
