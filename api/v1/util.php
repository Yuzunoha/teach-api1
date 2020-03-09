<?php

class util
{
    /**
     * urlのパスを取得する
     * '/teach-api1/api/v1/aaa/123/bbb?keyc=ccc&keyd=ddd'
     * [0] => aaa, [1] => 123, [2] => bbb
     */
    public static function getPathArray($url)
    {
        $s = explode('v1/', $url)[1];
        $s = explode('?', $s)[0];
        return explode('/', $s);
    }

    /**
     * クエリストリングを辞書で取得する
     * '/teach-api1/api/v1/aaa/123/bbb?keyc=ccc&keyd=ddd'
     * [keyc] => ccc, [keyd] => ddd
     */
    public static function getQSDict($url)
    {
        $dict = [];
        $qs = explode('?', $url)[1];
        $keyValues = explode('&', $qs);
        foreach ($keyValues as $keyValue) {
            $a = explode('=', $keyValue);
            $key = $a[0];
            $value = $a[1];
            $dict[$key] = $value;
        }
        return $dict;
    }

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
