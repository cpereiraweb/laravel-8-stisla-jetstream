<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alarm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "device_id",
        "timestamp",
        "event_date",
        "resolution_date",
        "duration",
        "description",
        "object",
        "navigation_menu",
        "value",
    ];
}
