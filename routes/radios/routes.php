<?php

use App\Actions\Podcast\PodcastGetLatestByShow;
use App\Actions\Podcast\RadioGetAll;
use App\Actions\Podcast\RadioGetOne;
use App\Actions\Podcast\ShowGetOne;
use App\Actions\Podcast\ShowGetPodcasts;
use App\Actions\User\LoggedIn\ShowImportRequestAdd;

$api->get('/radios', RadioGetAll::class);

$api->post('/radios/{id}/shows/import', function ($request, $response, $args) {
    return (new ShowImportRequestAdd(
        $request,
        $response,
        $args
    ))->execute();
});

$api->get('/radios/{id}', RadioGetOne::class);

$api->get('/radios/{id}/shows/{showId}', ShowGetOne::class);

$api->get('/radios/{id}/shows/{showId}/podcasts', ShowGetPodcasts::class);

$api->get('/radios/{id}/shows/{showId}/podcasts/latest', PodcastGetLatestByShow::class);



