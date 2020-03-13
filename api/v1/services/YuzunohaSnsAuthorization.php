<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';

class YuzunohaSnsAuthorization
{
    public static function auth($token)
    {
        return (1 <= count(YuzunohaSnsUser::selectWhereToken($token)));
    }
}
