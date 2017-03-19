<?php

namespace App\Actions\Podcast;

use App\Lib\Slime\RestAction\ApiAction;
use App\Lib\Slime\RestAction\Traits\Pagination;
use App\Models\Podcasts\RadioShow;

class ShowGetTrends extends ApiAction
{
    use Pagination;

    protected function performAction()
    {
        $this->pagination = $this->getPaginationParams($this->request);
        $this->payload = RadioShow::with('language')
            ->page($this->pagination)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}