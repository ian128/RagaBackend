<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = "comments";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "user_id",
        "sparring_id",
        "comment"
    ];

}
