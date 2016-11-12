<?php


namespace App\Actions\User\Admin;


use App\Actions\Base\AdminApiAction;
use App\Models\Users\FeedRequest;

class FeedRequestGetOne extends AdminApiAction
{

    protected function performAction()
    {
        $this->payload = FeedRequest::where(
            'id',
            $this->args['id']
        )->first();
    }
}