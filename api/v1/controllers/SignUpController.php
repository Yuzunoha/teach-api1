<?php

require_once dirname(__FILE__) . '/../util.php';

class SignUpController
{
    public static function post()
    {
        util::sendResponse('SignUpControllerのpostメソッド');
    }
}
