<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';

class SignUpService
{
    public static function signUp()
    {
        // test
        return YuzunohaSnsUser::selectOrderByIdDesc(4);
    }
}
