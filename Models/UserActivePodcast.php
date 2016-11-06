<?php

namespace App\Models;

use App\Lib\Slime\Models\SlimeModel;

class UserActivePodcast extends SlimeModel
{
    //todo: add podcast
    protected $fillable = [
        'user_id',
        'podcast_id',
        'minutes'
    ];
}