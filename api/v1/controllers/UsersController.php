<?php

declare(strict_types=1);

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
        foreach ($users as &$user) {
            unset($user['password_hash']);
            unset($user['token']);
        }
        util::sendResponse($users);
    }
    public static function put()
    {
        $tokenFromRequestHeader = util::getTokenFromRequestHeader();
        $idFromRequestUri = intval(util::getPathArray()[1]);
        YuzunohaSnsAuthorization::authTokenAndSendErrorResponse(
            $tokenFromRequestHeader,
            $idFromRequestUri
        );
        /* 認証OK */
        $body = util::getRequestJsonObj();
        $user = UsersService::put($idFromRequestUri, $body);
        if ($user instanceof YuzunohaSnsError) {
            util::sendResponse($user->getBody(), $user->statusCode);
        }
        unset($user['password_hash']);
        unset($user['token']);
        util::sendResponse($user);
    }
}
