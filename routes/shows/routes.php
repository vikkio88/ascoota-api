<?php

use App\Actions\Podcast\ShowGetOneBySlug;

$api->get('/shows/{slug}', function ($request, $response, $args) {
    return (new ShowGetOneBySlug($request, $response, $args))->execute();
});
