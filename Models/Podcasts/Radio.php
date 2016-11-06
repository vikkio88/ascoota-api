<?php

namespace App\Models\Podcasts;

use App\Lib\Slime\Models\SlimeModel;

class Radio extends SlimeModel
{
    protected $fillable = [
        'name',
        'description',
        'language_id',
        'website',
        'logo_url'
    ];

    public function shows()
    {
        return $this->hasMany(RadioShow::class);
    }
}