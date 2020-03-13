<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';

class SignInService
{
    public static function signIn($body)
    {
        $email = $body['sign_in_user_params']['email'];
        $password = $body['sign_in_user_params']['password'];
        $passwordConfirmation = $body['sign_in_user_params']['password_confirmation'];

        // 未入力ガード
        if ('' === $email) {
            return new YuzunohaSnsError('emailを入力してください', 400);
        }
        if ('' === $password) {
            return new YuzunohaSnsError('passwordを入力してください', 400);
        }

        // パスワード確認入力ガード
        if ($password !== $passwordConfirmation) {
            /* パスワード確認入力不一致 */
            return new YuzunohaSnsError('パスワードと確認入力が合致しません', 400);
        }

        // 存在確認(email & password)
        $selectResult = YuzunohaSnsUser::selectWhereEmail($email);
        $isError = false;
        if (0 === count($selectResult)) {
            /* emailが存在しない */
            $isError = true;
        } else {
            /* emailが存在する */
            $user = $selectResult[0];
            if (hash('sha256', $password) !== $user['password_hash']) {
                /* emailが存在するが、パスワードが違う */
                $isError = true;
            }
        }
        if ($isError) {
            return new YuzunohaSnsError('emailとpasswordの組が存在しません', 400);
        }
        /* ここではuserがいる */
        return $user;
    }
}
