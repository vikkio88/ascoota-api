<?php

use App\Actions\User\Auth\Facebook\Login as LoginFacebook;
use App\Actions\User\Auth\Facebook\Callback as CallbackFacebook;
use App\Actions\User\Login\LoginToken;


$api->get('/auth/facebook', function ($request, $response, $args) {
    return (new LoginFacebook($request, $response, $args))->execute();
});

$api->get('/auth/facebook/callback', function ($request, $response, $args) {
    return (new CallbackFacebook($request, $response, $args))->execute();
});

$api->get('/auth/{token}', function ($request, $response, $args) {
    return (new LoginToken($request, $response, $args))->execute();
});
