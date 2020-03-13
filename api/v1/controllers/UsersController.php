<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsAuthorization.php';
require_once dirname(__FILE__) . '/../services/UsersService.php';

class UsersController
{
    public static function get()
    {
        $tokenFromRequestHeader = util::getTokenFromRequestHeader();
        YuzunohaSnsAuthorization::authTokenAndSendErrorResponse($tokenFromRequestHeader);
        /* 認証OK */
        $qsDict = util::getQsDict();
        $users = UsersService::get($qsDict);
        util::sendResponse($users);
    }
}
