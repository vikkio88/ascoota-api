<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Podcasts\Category;
use App\Models\Podcasts\RadioShow;

class S1478903906Categories implements DbHelperInterface
{

    public function run()
    {
        $tags = [
            'comedy',
            'drama',
            'politics'
        ];

        foreach ($tags as $tag) {
            Category::create(
                [
                    'name' => $tag
                ]
            );
        }

        $radioShows = RadioShow::all();

        foreach ($radioShows as $radioShow) {
            $radioShow->categories()
                ->attach(
                    Category::all()->random()->id
                );
        }

    }

}