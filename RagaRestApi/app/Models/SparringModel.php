<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparringModel extends Model
{
    protected $table = "sparrings";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "court_id",
        "starting_time",
        "ending_time",
        "sport_id",
        "status"
    ];

}
