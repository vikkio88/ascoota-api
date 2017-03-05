<?php

use App\Actions\Podcast\PodcastsGetLatest;
use App\Actions\Podcast\ShowGetTrends;

$api->get('/trends/shows', function ($request, $response, $args) {
    return (new ShowGetTrends($request, $response, $args))->execute();
});

$api->get('/trends/podcasts/latest', function ($request, $response, $args) {
    return (new PodcastsGetLatest($request, $response, $args))->execute();
});
