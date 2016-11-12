<?php


namespace App\Actions\Base;


use App\Lib\Slime\Exceptions\Http\UnAuthorizedException;

abstract class AdminApiAction extends AuthApiAction
{

    protected function performChecks()
    {

        if (empty($this->userId)) {
            // Log attempt then remove token?
            throw new UnAuthorizedException('Unauthorized');
        }
    }

}