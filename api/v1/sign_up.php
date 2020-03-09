<?php

/*
[ユーザー登録]
POST: https://teachapi.herokuapp.com/sign_up
パラメーターが
body parameterで
{
sign_up_user_params: {
name: name,
bio: bio,
email: email,
password: password,
password_confirmation: passwordConfirmation
}
}
 */

require_once './util.php';

// postかどうか
if ('post' !== strtolower($_SERVER["REQUEST_METHOD"])) {
    /* postじゃない */
    util::sendResponse([
        'error' => 'メソッドがpostじゃない',
    ]);
    exit();
}

$o = util::getRequestJsonObj();

util::sendResponse($o);
