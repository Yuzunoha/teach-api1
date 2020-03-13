<?php

require_once dirname(__FILE__) . '/services/util.php';
require_once dirname(__FILE__) . '/controllers/SignUpController.php';
require_once dirname(__FILE__) . '/controllers/CommonController.php';

class Router
{
    public static function route()
    {
        $path = util::getPathArray();
        $qs = util::getQSDict();
        $method = util::getMethod();

        if ('sign_up' === $path[0]) {
            if ('POST' === $method) {
                SignUpController::post();
            }
        }

        CommonController::get();
    }
}
