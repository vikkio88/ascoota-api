<?php

use App\Actions\Podcast\RadioGetAll;
use App\Actions\Podcast\RadioGetOne;
use App\Actions\Podcast\ShowGetOne;

$api->get('/radios', function ($request, $response, $args) {
    return (new RadioGetAll(
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


