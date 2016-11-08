<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;
use App\Models\UserActivePodcast;

class User extends SlimeModel
{
    protected $fillable = [
        'name',
        'username',
        'email'
    ];

    public function scopeInfo($query)
    {
        return $query->with(
            'listening',
            'listening.podcast'
        );
    }

    public function listening()
    {
        return $this->hasOne(UserActivePodcast::class);
    }
}