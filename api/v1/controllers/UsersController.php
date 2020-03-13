<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/UsersService.php';

class UsersController
{
    public static function get()
    {
        $qsDict = util::getQSDict();
        $tokenFromRequestHeader = util::getTokenFromRequestHeader();

        $result = UsersService::getUsers($tokenFromRequestHeader, $qsDict);
        util::sendResponse($tokenFromRequestHeader);
    }
}
