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

util::guardByMethod('POST');

$o = util::getRequestJsonObj();

util::sendResponse($o);
