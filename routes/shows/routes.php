<?php

use App\Actions\Podcast\ShowGetOneBySlug;
use App\Actions\Podcast\ShowGetPodcasts;

$api->get('/shows/{slug}', function ($request, $response, $args) {
    return (new ShowGetOneBySlug($request, $response, $args))->execute();
});

$api->get('/shows/{showId}/podcasts', function ($request, $response, $args) {
    return (new ShowGetPodcasts(
        $request,
        $response,
        $args
    ))->execute();
});
