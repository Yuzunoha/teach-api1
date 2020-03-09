<?php

class util
{
    /**
     * 指定するメソッド以外はエラーにする
     */
    public static function guardByMethod($expectMethod)
    {
        $expectMethod = strtoupper($expectMethod);
        if ($expectMethod !== strtoupper($_SERVER['REQUEST_METHOD'])) {
            /* 期待するメソッドじゃない */
            util::sendResponse([
                'error' => 'メソッドが' . $expectMethod . 'じゃない',
            ]);
            exit();
        }
    }

    /**
     * リクエストのJSONのオブジェクトを取得する
     */
    public static function getRequestJsonObj()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * PHPの配列オブジェクトをレスポンスとして返す
     */
    public static function sendResponse($obj)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        echo json_encode($obj, JSON_UNESCAPED_UNICODE);
    }
}
