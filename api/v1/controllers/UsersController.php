<?php

require_once dirname(__FILE__) . '/../services/util.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsAuthorization.php';

class UsersController
{
    public static function get()
    {
        $qsDict = util::getQSDict();
        $tokenFromRequestHeader = util::getTokenFromRequestHeader();

        $result = YuzunohaSnsAuthorization::auth($tokenFromRequestHeader);
        util::sendResponse($result);
    }
}
