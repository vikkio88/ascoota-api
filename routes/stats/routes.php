<?php

$api->post('/stats', function ($request, $response, $args) {
    return (new \App\Actions\Misc\StatsPush(
        $request,
        $response,
        $args
    ))->execute();
});
