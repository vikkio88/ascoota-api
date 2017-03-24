<?php
use App\Actions\User\LoggedIn\MyInfoGet;
use App\Actions\User\LoggedIn\MyPositionSave;

$api->get('/me', MyInfoGet::class);

$api->put('/me/position', MyPositionSave::class);
