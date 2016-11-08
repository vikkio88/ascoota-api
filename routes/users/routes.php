<?php
use App\Actions\User\LoggedIn\MyInfoGet;
use App\Actions\User\UserGetAll;


$api->get('/users', function ($request, $response, $args) {
    return (
    new UserGetAll(
        $request,
        $response,
        $args
    )
    )->execute();
});


$api->get('/me', function ($request, $response, $args) {
    return (
    new MyInfoGet(
        $request,
        $response,
        $args
    )
    )->execute();
});

