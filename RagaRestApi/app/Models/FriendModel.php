<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendModel extends Model
{
    protected $table = "friends";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "user_id",
    ];

}
