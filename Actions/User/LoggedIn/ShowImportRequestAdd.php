<?php


namespace App\Actions\User\LoggedIn;


use App\Actions\Base\AuthApiAction;
use App\Models\Users\FeedRequest;

class ShowImportRequestAdd extends AuthApiAction
{

    protected function performAction()
    {
        $body = $this->getJsonRequestBody();
        $body['user_id'] = $this->userId;
        $this->payload = FeedRequest::create(
            $body
        );
    }
}