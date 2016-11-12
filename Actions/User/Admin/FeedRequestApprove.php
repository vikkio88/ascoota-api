<?php


namespace App\Actions\User\Admin;


use App\Actions\Base\AdminApiAction;
use App\Models\Users\FeedRequest;

class FeedRequestApprove extends AdminApiAction
{

    protected function performAction()
    {
        $feedRequest = FeedRequest::where(
            'id',
            $this->args['id']
        )->first();
        $feedRequest->approved = true;
        $feedRequest->save();

        $this->payload = true;
    }
}