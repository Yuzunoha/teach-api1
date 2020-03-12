<?php

require_once dirname(__FILE__) . '/../util.php';

class CommonController
{
    public static function get()
    {
        $path = util::getPathArray();
        $qs = util::getQSDict();
        $method = util::getMethod();

        util::sendResponse([
            'path' => $path,
            'qs' => $qs,
            'method' => $method,
        ]);
    }
}
