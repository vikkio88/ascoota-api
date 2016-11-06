<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Podcasts\RadioShow;

class S1478457002Podcasts implements DbHelperInterface
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $radioShows = RadioShow::all();

        foreach ($radioShows as $radioShow) {
            $podcast = rand(1, 20);
            foreach (range(1, $podcast) as $_) {
                \App\Models\Podcasts\Podcast::create(
                    [
                        'name' => $faker->text(rand(6, 100)),
                        'description' => $faker->text(rand(10, 100)),
                        'date' => $faker->dateTime,
                        'file_url' => $faker->url . '/' . str_random(10) . '.mp3',
                        'radio_show_id' => $radioShow->id
                    ]
                );
            }
        }

    }

}