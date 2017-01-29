<?php


namespace App\Lib\Helpers;

class TokenHelper
{
    public static function getTokenPayload($userId)
    {
        return [
            'userId' => $userId,
            'validUntil' => time() + (Config::get('app.tokenLife') * 3600)
        ];
    }

    public static function generateRandomToken()
    {
        return str_random(15) . crypt(str_random(6));
    }
}