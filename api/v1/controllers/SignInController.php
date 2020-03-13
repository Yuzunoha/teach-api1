<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/SignInService.php';

class SignInController
{
    public static function post()
    {
        $body = util::getRequestJsonObj();
        $result = SignInService::signIn($body);
        if ($result instanceof YuzunohaSnsError) {
            util::sendResponse($result->getBody(), $result->statusCode);
        }
        unset($result['password_hash']);
        util::sendResponse($result);
    }
}
