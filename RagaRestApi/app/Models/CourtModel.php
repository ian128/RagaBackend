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
        "user_id",
        "sport_id",
        "email",
        "photo",
        "weekday_price",
        "weekend_price",
        "location",
        "phone_number"
    ];

}
