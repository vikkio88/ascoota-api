<?php
use App\Actions\User\LoggedIn\MyInfoGet;
use App\Actions\User\LoggedIn\MyPositionSave;

$api->get('/me', function ($request, $response, $args) {
    return (new MyInfoGet($request, $response, $args))->execute();
});

$api->put('/me/position', function ($request, $response, $args) {
    return (new MyPositionSave($request, $response, $args))->execute();
});

