<?php

use App\Actions\Podcast\RadioGetAll;

$api->get('/radios', function ($request, $response, $args) {
    return (new RadioGetAll(
        $request,
        $response,
        $args
    ))->execute();
});
