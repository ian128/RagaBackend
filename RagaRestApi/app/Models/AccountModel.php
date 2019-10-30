<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = "accounts";

    public $timestamps = false;

    protected $fillable = [
        "id",
        "email",
        "first_name",
        "last_name",
        "password",
        "phone_number",
        "photo_profile"
    ];

}
