<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';

class SignUpService
{
    public static function signUp($body)
    {
        /*
        sign_up_user_params:
        name: ""
        bio: ""
        email: ""
        password: ""
        password_confirmation: ""
         */
        $name = $body['sign_up_user_params']['name'];
        $bio = $body['sign_up_user_params']['bio'];
        $email = $body['sign_up_user_params']['email'];
        $password = $body['sign_up_user_params']['password'];
        $passwordConfirmation = $body['sign_up_user_params']['password_confirmation'];

        // 未入力ガード
        if (!isset($name)) {
            return new YuzunohaSnsError('nameを入力してください', 400);
        }
        if (!isset($bio)) {
            return new YuzunohaSnsError('bioを入力してください', 400);
        }
        if (!isset($email)) {
            return new YuzunohaSnsError('emailを入力してください', 400);
        }
        if (!isset($password)) {
            return new YuzunohaSnsError('passwordを入力してください', 400);
        }

        // パスワード確認入力ガード
        if ($password !== $passwordConfirmation) {
            /* パスワード確認入力不一致 */
            return new YuzunohaSnsError('パスワードと確認入力が合致しません', 400);
        }

        // email重複ガード
        if (1 <= count(YuzunohaSnsUser::selectWhereEmail($email))) {
            /* email重複 */
            return new YuzunohaSnsError('そのemailは既に登録されています', 400);
        }

        return '開発中';
    }
}
