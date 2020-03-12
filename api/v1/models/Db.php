<?php

require_once dirname(__FILE__) . '/../util.php';

class Db
{
    public static $host = 'mysql';
    public static $dbname = 'yuzunoha_sns';
    public static $username = 'root';
    public static $password = 'root';
    public static $pdo = null;

    public static function getPdo()
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $dsn = 'mysql:host=' . self::$host . '; ';
        $dsn .= 'dbname=' . self::$dbname . '; ';
        $dsn .= 'charset=utf8;';

        try {
            return new PDO($dsn, self::$username, self::$password);
        } catch (PDOException $e) {
            // TODO: エラー出力
            util::sendResponse([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
