<?php

namespace App\Actions\Podcast;

use App\Lib\Slime\RestAction\ApiAction;
use App\Models\Podcasts\RadioShow;

class ShowGetTrends extends ApiAction
{
    protected function performAction()
    {
        $this->payload = RadioShow::orderBy('created_at', 'DESC')->limit(6)->get();
    }
}