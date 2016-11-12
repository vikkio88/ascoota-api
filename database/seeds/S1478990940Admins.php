<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Users\Admin;

class S1478990940Admins implements DbHelperInterface
{

    public function run()
    {
        Admin::create(['user_id' => 1]);
    }

}