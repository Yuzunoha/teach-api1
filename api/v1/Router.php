<?php

require_once dirname(__FILE__) . '/services/util.php';
require_once dirname(__FILE__) . '/controllers/SignUpController.php';
require_once dirname(__FILE__) . '/controllers/SignInController.php';
require_once dirname(__FILE__) . '/controllers/UsersController.php';
require_once dirname(__FILE__) . '/controllers/CommonController.php';

class Router
{
    public static function route()
    {
        $path = util::getPathArray();
        $method = util::getMethod();

        if ('sign_up' === $path[0]) {
            if ('POST' === $method) {
                SignUpController::post();
            }
        }
        if ('sign_in' === $path[0]) {
            if ('POST' === $method) {
                SignInController::post();
            }
        }
        if ('users' === $path[0]) {
            if ('GET' === $method) {
                UsersController::get();
            }
        }

        CommonController::get();
    }
}
