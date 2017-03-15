<?php

use App\Actions\User\Auth\LoginToken;

$api->get('/auth/{token}', function ($request, $response, $args) {
    return (new LoginToken($request, $response, $args))->execute();
});
