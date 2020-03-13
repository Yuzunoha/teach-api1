<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';
require_once dirname(__FILE__) . '/../services/util.php';

class YuzunohaSnsAuthorization
{
    /* tokenがアリさえすればtrue */
    public static function authTokenExist($token)
    {
        return (1 <= count(YuzunohaSnsUser::selectWhereToken($token)));
    }

    /* tokenがアリかつuserIdと合致すればtrue */
    public static function authTokenAndUserId($token, $userId)
    {
        $user = YuzunohaSnsUser::selectWhereToken($token)[0];
        return (intval($userId) === intval($user['id']));
    }

    /**
     * 認証失敗ならエラーレスポンス送信
     */
    public static function authTokenAndSendErrorResponse($token, $userId = null)
    {
        if ($userId) {
            /* tokenがアリかつuserIdと合致すればok */
            $authResult = self::authTokenAndUserId($token, $userId);
        } else {
            /* tokenがアリさえすればok */
            $authResult = self::authTokenExist($token);
        }
        if (false === $authResult) {
            $error = new YuzunohaSnsError("tokenがおかしい", 401);
            util::sendResponse($error->getBody(), $error->statusCode);
        }
    }
}
