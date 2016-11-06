<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Misc\Language;
use App\Models\Podcasts\Radio;

class S1478390350Radios implements DbHelperInterface
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $radiosNumber = 10;
        foreach (range(0, $radiosNumber) as $_) {
            Radio::create(
                [
                    'name' => $faker->company . rand(1, 5),
                    'description' => $faker->text(rand(2, 100)),
                    'language_id' => Language::all()->random()->id,
                    'website' => $faker->url,
                    'logo_url' => $faker->imageUrl(200, 200)
                ]
            );
        }
    }

}