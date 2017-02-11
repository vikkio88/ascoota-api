<?php


namespace App\Scripts;


use App\Models\Podcasts\Podcast;
use App\Models\Podcasts\RadioShow;
use Mashtru\Libs\Interfaces\Job;

class FixPodcastLinks implements Job
{

    public function fire(array $parameters = [])
    {
        $max = 30;
        $radioShows = RadioShow::all();
        foreach ($radioShows as $radioShow) {
            $podcasts = Podcast::latestByShowId($radioShow->id)->limit($max)->get();
            $numberOfPodcasts = count($podcasts);
            for ($i = 0; $i < $numberOfPodcasts; $i++) {
                if ($i + 1 < $numberOfPodcasts) {
                    $podcasts[$i]->previous_podcast_id = $podcasts[$i + 1]->id;
                }
                if ($i - 1 >= 0) {
                    $podcasts[$i]->next_podcast_id = $podcasts[$i - 1]->id;
                }
                $podcasts[$i]->save();
            }
        }
    }

    public function getName()
    {
        return "fixPodcastLinks";
    }
}