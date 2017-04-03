<?php

namespace App\Actions\Podcast;

use App\Lib\Helpers\PodcastFeedImporter;
use App\Lib\Helpers\RadioFeedGateway;
use App\Lib\Slime\RestAction\ApiAction;

class ShowParseFromFeedUrl extends ApiAction
{
    protected function performAction()
    {
        $radioFeedGateway = new RadioFeedGateway();
        $parsed = $radioFeedGateway->getFullPodcastArrayFromFeed($this->getJsonRequestBody()['feed']);
        $feed = new PodcastFeedImporter($parsed);
        $this->payload = array_merge(
            $feed->getShowInfo()->toArray(),
            [
                'podcasts' => $feed->getPodcastsInfo()
            ]
        );
    }
}