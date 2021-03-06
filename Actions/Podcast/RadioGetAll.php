<?php


namespace App\Actions\Podcast;

use App\Lib\Slime\RestAction\ApiAction;
use App\Lib\Slime\RestAction\Traits\Pagination;
use App\Models\Podcasts\Radio;

class RadioGetAll extends ApiAction
{
    use Pagination;

    protected function performAction()
    {
        $this->pagination = $this->getPaginationParams($this->request);
        $this->payload = Radio::with('language')
            ->filter($this->getQueryParams())
            ->page($this->pagination)
            ->orderBy('updated_at', 'DESC')
            ->get();
    }
}