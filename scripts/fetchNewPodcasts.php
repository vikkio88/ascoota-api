<?php
use App\Lib\Helpers\PodcastFeedImporter;
use App\Lib\Helpers\RadioFeedGateway;
use App\Models\Podcasts\Podcast;
use App\Models\Podcasts\RadioShow;

require 'includes/includes.php';

$radioShows = RadioShow::all();
$radioFeedGateway = new RadioFeedGateway();
logInfo('started importer');
foreach ($radioShows as $radioShow) {
    logInfo('importing podcasts for show: ' . $radioShow->name);
    $latestPodcast = Podcast::latestByShowId($radioShow->id)->first();
    $parsed = $radioFeedGateway->getFullPodcastArrayFromFeed($radioShow->feed_url);
    $feed = new PodcastFeedImporter($parsed);
    $podcasts = $feed->getPodcastsInfo($latestPodcast->file_url);
    foreach ($podcasts as $podcast) {
        $podcast->radio_show_id = $radioShow->id;
        $podcast->save();
    }
    logInfo('imported ' . count($podcasts) . ' new podcasts for show: ' . $radioShow->name);
}
logInfo('finished importer');
