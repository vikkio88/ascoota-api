<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;

class User extends SlimeModel
{
    protected $fillable = [
        'name',
        'username',
        'email'
    ];
}