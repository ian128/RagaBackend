<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = "accounts";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "email",
        "username",
        "password",
        "phone_number"
    ];

}
