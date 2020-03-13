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
        $signUpUserParams = $body['sign_up_user_params'];

        // パスワード確認入力ガード
        if ($signUpUserParams['password'] !== $signUpUserParams['password_confirmation']) {
            /* パスワード確認入力不一致 */
            return new YuzunohaSnsError('パスワードと確認入力が合致しません', 400);
        }

        // email重複ガード
        if (1 <= count(YuzunohaSnsUser::selectWhereEmail($signUpUserParams['email']))) {
            /* email重複 */
            return new YuzunohaSnsError('そのemailは既に登録されています', 400);
        }

        return '開発中';
    }
}
