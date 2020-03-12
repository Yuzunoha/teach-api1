<?php

require_once dirname(__FILE__) . '/Db.php';

class SignUpModel
{
    public static function test()
    {
        return Db::getPdo();
    }
}
