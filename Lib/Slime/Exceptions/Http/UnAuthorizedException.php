<?php


namespace App\Lib\Slime\Exceptions\Http;


use App\Lib\Slime\Exceptions\SlimeException;

class UnAuthorizedException extends SlimeException
{
    protected $code = 401;

}