<?php

namespace App\Models\Podcasts;

use App\Lib\Slime\Models\SlimeModel;
use App\Models\Misc\Language;

class Radio extends SlimeModel
{
    protected $fillable = [
        'name',
        'description',
        'language_id',
        'website',
        'logo_url'
    ];

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function shows()
    {
        return $this->hasMany(RadioShow::class);
    }
}