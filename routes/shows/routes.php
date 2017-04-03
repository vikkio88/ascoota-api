<?php

use App\Actions\Podcast\ShowGetOneBySlug;
use App\Actions\Podcast\ShowGetPodcasts;
use App\Actions\Podcast\ShowParseFromFeedUrl;

$api->post('/shows/parse', ShowParseFromFeedUrl::class);

$api->get('/shows/{slug}', ShowGetOneBySlug::class);

$api->get('/shows/{showId}/podcasts', ShowGetPodcasts::class);
