<?php

namespace App\Models;

use App\Lib\Slime\Models\SlimeModel;
use App\Models\Podcasts\Podcast;

class UserActivePodcast extends SlimeModel
{
    protected $visible = [
        'position',
        'podcast'
    ];

    protected $fillable = [
        'user_id',
        'podcast_id',
        'position'
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}