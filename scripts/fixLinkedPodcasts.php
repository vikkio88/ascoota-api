<?php
use App\Models\Podcasts\Podcast;
use App\Models\Podcasts\RadioShow;

require 'includes/includes.php';

$max = 30;

$radioShows = RadioShow::all();
logInfo('started podcast link fixer');
foreach ($radioShows as $radioShow) {
    logInfo('getting last ' . $max . ' podcast from: ' . $radioShow->name);
    $podcasts = Podcast::latestByShowId($radioShow->id)->limit($max)->get();
    logInfo('fixing links');
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

    logInfo('saving results');

}
logInfo('finished link fixer');
