<?php

require_once './util.php';
require_once './controllers/SignUpController.php';
require_once './controllers/CommonController.php';

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
