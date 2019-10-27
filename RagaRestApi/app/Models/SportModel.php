<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportModel extends Model
{
    protected $table = "sports";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "max_participant"
    ];

}
