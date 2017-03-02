<?php

use App\Actions\Podcast\ShowGetTrends;

$api->get('/trends/shows', function ($request, $response, $args) {
    return (new ShowGetTrends($request, $response, $args))->execute();
});
