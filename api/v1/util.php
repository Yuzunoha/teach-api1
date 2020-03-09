<?php

class util
{
    public static function getRequestJsonObj()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public static function sendResponse($obj)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        echo json_encode($obj, JSON_UNESCAPED_UNICODE);
    }
}
