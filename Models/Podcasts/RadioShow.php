<?php

namespace App\Models\Podcasts;

use App\Lib\Slime\Models\SlimeModel;

class RadioShow extends SlimeModel
{

    protected $fillable = [
        'name',
        'slug',
        'description',
        'author',
        'explicit',
        'radio_id',
        'website',
        'feed_url',
        'logo_url',
        'frequency_id'
    ];

    protected $casts = [
        'explicit' => 'boolean'
    ];

    public function radio()
    {
        return $this->belongsTo(Radio::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class)
            ->orderBy('date', 'DESC')
            ->limit(5);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'radio_show_categories');
    }

    public function scopeInfo($query)
    {
        return $query->with(
            'categories',
            'podcasts'
        );
    }
}