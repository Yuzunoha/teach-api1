<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';
require_once dirname(__FILE__) . '/../services/util.php';

class YuzunohaSnsAuthorization
{
    /* tokenがアリさえすればtrue */
    public static function authTokenExist(string $token): bool
    {
        return (1 <= count(YuzunohaSnsUser::selectWhereToken($token)));
    }

    /* tokenがアリかつuserIdと合致すればtrue */
    public static function authTokenAndUserId(string $token, int $userId): bool
    {
        $user = YuzunohaSnsUser::selectWhereToken($token)[0];
        return ($userId === intval($user['id']));
    }

    /**
     * 認証失敗ならエラーレスポンス送信
     */
    public static function authTokenAndSendErrorResponse(string $token, int $userId = null): void
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
