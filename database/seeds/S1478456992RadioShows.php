<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Misc\Language;
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
                        'author' => $faker->name(),
                        'description' => $faker->text(rand(6, 100)),
                        'radio_id' => $radio->id,
                        'language_id' => Language::all()->random()->id,
                        'website' => $faker->url,
                        'feed_url' => $faker->url . '/feed.xml',
                        'logo_url' => $faker->imageUrl(200, 200),
                        'frequency_id' => ShowFrequency::all()->random()->id
                    ]
                );
            }
        }
    }

}