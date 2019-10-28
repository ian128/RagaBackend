<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = "schedules";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "day",
        "open",
        "close",
        "court_id"
    ];

}
