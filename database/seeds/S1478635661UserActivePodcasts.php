<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Podcasts\Podcast;
use App\Models\Users\User;
use App\Models\Users\UserActivePodcast;

class S1478635661UserActivePodcasts implements DbHelperInterface
{

    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            UserActivePodcast::create(
                [
                    'podcast_id' => Podcast::all()->random()->id,
                    'user_id' => $user->id,
                    'position' => rand(1, 4500)
                ]
            );
        }
    }

}