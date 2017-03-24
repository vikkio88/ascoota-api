<?php

use App\Actions\User\Admin\FeedRequestApprove;
use App\Actions\User\Admin\FeedRequestDecline;
use App\Actions\User\Admin\FeedRequestGetAll;
use App\Actions\User\Admin\FeedRequestGetOne;

$api->get('/admin/requests', FeedRequestGetAll::class);

$api->get('/admin/requests/{id}', FeedRequestGetOne::class);

$api->post('/admin/requests/{id}/approve', FeedRequestApprove::class);

$api->delete('/admin/requests/{id}/decline', FeedRequestDecline::class);
