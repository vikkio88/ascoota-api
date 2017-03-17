<?php

use App\Actions\User\Auth\Facebook\SignIn as FacebookSignIn;
use App\Actions\User\Auth\LoginToken;

$api->post('/auth/facebook', function ($request, $response, $args) {
    return (new FacebookSignIn($request, $response, $args))->execute();
});

$api->get('/auth/{token}', function ($request, $response, $args) {
    return (new LoginToken($request, $response, $args))->execute();
});
