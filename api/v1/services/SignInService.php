<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';

class SignInService
{
    public static function signIn($body)
    {
        return "サインインサービス";

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
        $user = YuzunohaSnsUser::selectWhereEmail($email)[0];
        return $user;
    }
}
