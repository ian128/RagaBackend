<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparringModel extends Model
{
    protected $table = "sparrings";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "sport_id",
        "court_id",
        "date",
        "price_per_person",
        "start_time",
        "end_time",
        "desc",
        "who_can_play",
        "repeat_every_week",
        "user_id"
    ];

}
