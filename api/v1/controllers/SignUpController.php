<?php

require_once dirname(__FILE__) . '/../util.php';
require_once dirname(__FILE__) . '/../services/SignUpService.php';

class SignUpController
{
    public static function post()
    {
        $result = SignUpService::signUp();

        util::sendResponse($result);
    }
}
