<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = "schedules";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "weekday_weekend",
        "open",
        "close",
        "court_id"
    ];

}
