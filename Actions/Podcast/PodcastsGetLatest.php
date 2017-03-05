<?php

namespace App\Actions\Podcast;

use App\Lib\Slime\RestAction\ApiAction;
use App\Models\Podcasts\Podcast;

class PodcastsGetLatest extends ApiAction
{
    protected function performAction()
    {
        $this->payload = Podcast::limit(5)
            ->with('show')
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}