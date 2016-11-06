<?php

namespace App\Models\Podcasts;

use App\Lib\Slime\Models\SlimeModel;

class RadioShow extends SlimeModel
{

    protected $fillable = [
        'name',
        'description',
        'website',
        'logo_url',
        'radio_id',
        'last_sync',
        'frequency_id'
    ];

    public function radio()
    {
        return $this->belongsTo(Radio::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class);
    }
}