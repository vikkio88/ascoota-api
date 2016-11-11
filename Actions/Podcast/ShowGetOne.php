<?php


namespace App\Actions\Podcast;

use App\Lib\Slime\RestAction\ApiAction;
use App\Models\Podcasts\RadioShow;

class ShowGetOne extends ApiAction
{
    protected function performAction()
    {
        $this->payload = RadioShow::info()->where(
            [
                'radio_id' => $this->args['id'],
                'id' => $this->args['showId'],
            ]
        )->first();
    }
}