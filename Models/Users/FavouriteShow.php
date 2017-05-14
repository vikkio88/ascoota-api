<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;
use App\Models\Podcasts\RadioShow;

class FavouriteShow extends SlimeModel
{
    protected $fillable = [
        'user_id',
        'show_id'
    ];

    public function show()
    {
        return $this->hasOne(RadioShow::class, 'id', 'show_id');
    }
}