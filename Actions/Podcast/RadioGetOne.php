<?php


namespace App\Actions\Podcast;

use App\Lib\Slime\RestAction\ApiAction;
use App\Models\Podcasts\Radio;

class RadioGetOne extends ApiAction
{
    protected function performAction()
    {
        $this->payload = Radio::with(
            'shows'
        )->where(
            'id',
            $this->args['id']
        )->first();
    }
}