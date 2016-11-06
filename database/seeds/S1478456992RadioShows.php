<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Podcasts\Radio;
use App\Models\Podcasts\RadioShow;
use App\Models\Podcasts\ShowFrequency;

class S1478456992RadioShows implements DbHelperInterface
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $radios = Radio::all();
        foreach ($radios as $radio) {
            $showsNumber = rand(2, 10);
            foreach (range(0, $showsNumber) as $_) {
                RadioShow::create(
                    [
                        'name' => $faker->company . rand(1, 5),
                        'description' => $faker->text(rand(6, 100)),
                        'radio_id' => $radio->id,
                        'website' => $faker->url,
                        'logo_url' => $faker->imageUrl(200, 200),
                        'last_sync' => $faker->dateTime,
                        'next_sync' => $faker->dateTime,
                        'frequency_id' => ShowFrequency::all()->random()->id
                    ]
                );
            }
        }
    }

}