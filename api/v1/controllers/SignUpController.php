<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/SignUpService.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';

class SignUpController
{
    public static function post()
    {
        $body = util::getRequestJsonObj();
        $result = SignUpService::signUp($body);
        if ($result instanceof YuzunohaSnsError) {
            util::sendResponse($result->getBody(), $result->statusCode);
        }

        // これで本家と同じ形
        unset($result['password_hash']);
        util::sendResponse($result);
    }
}
