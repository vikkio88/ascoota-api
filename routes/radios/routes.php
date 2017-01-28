<?php

use App\Actions\Podcast\PodcastGetLatestByShow;
use App\Actions\Podcast\RadioGetAll;
use App\Actions\Podcast\RadioGetOne;
use App\Actions\Podcast\ShowGetOne;
use App\Actions\User\LoggedIn\ShowImportRequestAdd;

$api->get('/radios', function ($request, $response, $args) {
    return (new RadioGetAll(
        $request,
        $response,
        $args
    ))->execute();
});

$api->post('/radios/{id}/shows/import', function ($request, $response, $args) {
    return (new ShowImportRequestAdd(
        $request,
        $response,
        $args
    ))->execute();
});

$api->get('/radios/{id}', function ($request, $response, $args) {
    return (new RadioGetOne(
        $request,
        $response,
        $args
    ))->execute();
});

$api->get('/radios/{id}/shows/{showId}', function ($request, $response, $args) {
    return (new ShowGetOne(
        $request,
        $response,
        $args
    ))->execute();
});

$api->get('/radios/{id}/shows/{showId}/podcasts/latest', function ($request, $response, $args) {
    return (new PodcastGetLatestByShow(
        $request,
        $response,
        $args
    ))->execute();
});


