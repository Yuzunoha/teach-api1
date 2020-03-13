<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsAuthorization.php';

class UsersController
{
    public static function get()
    {
        $tokenFromRequestHeader = util::getTokenFromRequestHeader();
        YuzunohaSnsAuthorization::authTokenAndSendErrorResponse($tokenFromRequestHeader, '19');
        util::sendResponse("認証OK");
    }
}
