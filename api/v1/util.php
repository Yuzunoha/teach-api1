<?php

/**
 * このファイルはルーティングを行うため、.htaccessと同じディレクトリに置く
 */
class util
{
    /**
     * urlのパスを取得する
     * '/teach-api1/api/v1/aaa/123/bbb?keyc=ccc&keyd=ddd'
     * [0] => aaa, [1] => 123, [2] => bbb
     */
    public static function getPathArray()
    {
        $baseDirName = array_pop(explode('/', dirname(__FILE__)));
        $s = explode($baseDirName . '/', $_SERVER['REQUEST_URI'])[1];
        $s = explode('?', $s)[0];
        return explode('/', $s);
    }

    /**
     * クエリストリングを辞書で取得する
     * '/teach-api1/api/v1/aaa/123/bbb?keyc=ccc&keyd=ddd'
     * [keyc] => ccc, [keyd] => ddd
     */
    public static function getQSDict()
    {
        $dict = [];
        $qs = explode('?', $_SERVER['REQUEST_URI'])[1];
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
     * メソッド取得(大文字化)
     */
    public static function getMethod()
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
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
        exit();
    }
}
