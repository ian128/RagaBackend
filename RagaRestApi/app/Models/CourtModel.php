<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourtModel extends Model
{
    protected $table = "courts";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "weekday_price",
        "weekend_price",
        "location",
        "phone_number"
    ];

}
