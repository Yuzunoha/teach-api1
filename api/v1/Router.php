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
        if ('users' === $path[0]) {
            if ('PUT' === $method) {
                UsersController::put();
            }
        }
        /* https://teachapi.herokuapp.com/users/321 */
        /* {method: "PUT", headers: {…}, body: "{"user_params":{"name":"aa","bio":"ab"}}"} */
        /* {id: 321, name: "aa", bio: "ab", email: "a", created_at: "2019-", …}  */

        CommonController::get();
    }
}
