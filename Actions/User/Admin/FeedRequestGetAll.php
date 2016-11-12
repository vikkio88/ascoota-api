<?php


namespace App\Actions\User\Admin;


use App\Actions\Base\AdminApiAction;
use App\Lib\Slime\RestAction\Traits\Pagination;
use App\Models\Users\FeedRequest;

class FeedRequestGetAll extends AdminApiAction
{
    use Pagination;

    protected function performAction()
    {
        $this->pagination = $this->getPaginationParams($this->request);
        $this->payload = FeedRequest::page(
            $this->pagination
        )->get();
    }
}