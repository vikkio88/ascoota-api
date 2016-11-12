<?php

namespace App\Models;

use App\Lib\Slime\Models\SlimeModel;

class Admin extends SlimeModel
{
    protected $fillable = [
        'user_id'
    ];
}