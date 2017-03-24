<?php

use App\Actions\Podcast\ShowGetOneBySlug;
use App\Actions\Podcast\ShowGetPodcasts;

$api->get('/shows/{slug}', ShowGetOneBySlug::class);

$api->get('/shows/{showId}/podcasts', ShowGetPodcasts::class);
