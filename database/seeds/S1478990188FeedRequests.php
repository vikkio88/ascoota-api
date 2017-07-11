<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Podcasts\Radio;
use App\Models\Users\FeedRequest;
use App\Models\Users\User;

class S1478990188FeedRequests implements DbHelperInterface
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all()->random(4);

        foreach ($users as $user) {
            FeedRequest::create(
                [
                    'user_id' => $user->id,
                    'radio_name' => 'radio ' . $faker->lastName,
                    'feed_url' => $faker->url,
                    'radio_id' => Radio::all()->random()->id,
                ]
            );
        }

    }

}