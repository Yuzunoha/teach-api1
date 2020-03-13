<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';
require_once dirname(__FILE__) . '/../services/YuzunohaSnsError.php';

class SignUpService
{
    public static function signUp($body)
    {
        $name = $body['sign_up_user_params']['name'];
        $bio = $body['sign_up_user_params']['bio'];
        $email = $body['sign_up_user_params']['email'];
        $password = $body['sign_up_user_params']['password'];
        $passwordConfirmation = $body['sign_up_user_params']['password_confirmation'];

        // 未入力ガード
        if ('' === $name) {
            return new YuzunohaSnsError('nameを入力してください', 400);
        }
        if ('' === $bio) {
            return new YuzunohaSnsError('bioを入力してください', 400);
        }
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

        // email重複ガード
        if (1 <= count(YuzunohaSnsUser::selectWhereEmail($email))) {
            /* email重複 */
            return new YuzunohaSnsError('そのemailは既に登録されています', 400);
        }

        /* ガード突破 */
        // insert
        $result = YuzunohaSnsUser::insert($name, $bio, $email, $password);
        if (!$result) {
            /* 失敗 */
            return new YuzunohaSnsError('登録に失敗しました', 500);
        }
        /* 成功 */
        return YuzunohaSnsUser::selectOrderByIdDesc(1)[0];
    }
}
