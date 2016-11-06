<?php

use App\Actions\Misc\LanguagesGetAll;

$api->get('/misc/languages', function ($request, $response, $args) {
    return (new LanguagesGetAll(
        $request,
        $response,
        $args
    ))->execute();
});
