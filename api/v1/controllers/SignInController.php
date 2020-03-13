<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/SignInService.php';

class SignInController
{
    public static function post()
    {
        util::sendResponse("サインインコントローラ");

        $body = util::getRequestJsonObj();
        SignInService::signIn($body);
    }
}
