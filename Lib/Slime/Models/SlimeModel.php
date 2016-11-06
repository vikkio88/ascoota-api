<?php

namespace App\Lib\Slime\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SlimeModel extends Eloquent
{

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function scopePage($query, $pagination)
    {
        $limit = $pagination['limit'];
        $offset = ($pagination['page'] - 1) * $pagination['limit'];
        return $query->take($limit)->skip($offset);
    }

}