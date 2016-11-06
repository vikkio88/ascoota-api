<?php

use App\Actions\Podcast\PodcastGetOne;

$api->get('/podcasts/{id}', function ($request, $response, $args) {
    return (new PodcastGetOne(
        $request,
        $response,
        $args
    ))->execute();
});
