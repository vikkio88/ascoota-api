<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;

class FeedRequest extends SlimeModel
{
    protected $fillable = [
        'feed_url',
        'radio_name',
        'radio_id',
        'user_id',
        'approved'
    ];
}