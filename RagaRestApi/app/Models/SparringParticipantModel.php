<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparringParticipantModel extends Model
{
    protected $table = "sparring_participants";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "user_id",
        "sparring_id"
    ];

}
