<?php

$api->get('/admin/requests', function ($request, $response, $args) {
    return (new FeedRequestGetAll(
        $request,
        $response,
        $args
    )
    )->execute();
});

$api->get('/admin/requests/{id}', function ($request, $response, $args) {
    return (new FeedRequestGetOne(
        $request,
        $response,
        $args
    )
    )->execute();
});

$api->post('/admin/requests/{id}/approve', function ($request, $response, $args) {
    return (new FeedRequestApprove(
        $request,
        $response,
        $args
    )
    )->execute();
});

$api->delete('/admin/requests/{id}/decline', function ($request, $response, $args) {
    return (new FeedRequestDecline(
        $request,
        $response,
        $args
    )
    )->execute();
});
