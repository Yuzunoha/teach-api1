<?php

require_once dirname(__FILE__) . '/../services/util.php';

class UsersController
{
    public static function get()
    {
        util::sendResponse("ユーザーズコントローラ");
    }
}
