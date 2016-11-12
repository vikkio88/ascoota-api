<?php


namespace App\Actions\User\Admin;


use App\Actions\Base\AdminApiAction;
use App\Models\Users\FeedRequest;

class FeedRequestDecline extends AdminApiAction
{

    protected function performAction()
    {
        $this->payload = FeedRequest::destroy($this->args['id']);
    }
}