<?php

require_once dirname(__FILE__) . '/../util.php';
require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';

class SignUpController
{
    public static function post()
    {
        $result = YuzunohaSnsUser::insert();

        util::sendResponse($result);
    }
}
