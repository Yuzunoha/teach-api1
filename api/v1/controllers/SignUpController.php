<?php

require_once dirname(__FILE__) . '/../util.php';
require_once dirname(__FILE__) . '/../models/SignUpModel.php';

class SignUpController
{
    public static function post()
    {
        $result = SignUpModel::signUp();

        util::sendResponse($result);
    }
}
