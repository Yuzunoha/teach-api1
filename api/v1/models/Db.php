<?php

require_once dirname(__FILE__) . '/../services/util.php';

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

    /**
     * sqlを実行するラッパー関数
     */
    public static function prepareAndExecute($sql, $params = null, $isUpdate = false)
    {
        $stmt = Db::getPdo()->prepare($sql);
        if (isset($params)) {
            /* パラメタがある */
            foreach ($params as $key => $ary) {
                $value = $ary[0];
                $type = $ary[1];
                $stmt->bindValue($key, $value, $type);
            }
        }
        $result = $stmt->execute();
        if ($isUpdate) {
            /* 更新系 */
            return $result;
        }
        /* 参照系 */
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
