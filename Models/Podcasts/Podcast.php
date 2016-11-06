<?php

namespace App\Models\Podcasts;

use App\Lib\Slime\Models\SlimeModel;

class Podcast extends SlimeModel
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'file_url',
        'radio_show_id'
    ];


    public function show()
    {
        return $this->belongsTo(
            RadioShow::class,
            'radio_show_id'
        );
    }
}