<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/SignUpService.php';

class SignUpController
{
    public static function post()
    {
        $body = util::getRequestJsonObj();
        $result = SignUpService::signUp($body);
        util::sendResponse($result);
    }
}
