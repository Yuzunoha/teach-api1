<?php

require_once dirname(__FILE__) . '/Db.php';

class YuzunohaSnsUser
{
    public static function insert($name, $bio, $password)
    {
        $password_hash = hash('sha256', $password);
        $secret = 'ユズノハさんだよ';
        $tokenSeed = $password_hash . microtime() . $secret;
        $token = hash('sha256', $tokenSeed);

        $sql = 'insert into yuzunoha_sns_user ';
        $sql .= '(name, bio, password_hash, token) ';
        $sql .= 'values (:name, :bio, :password_hash, :token)';

        $params = [
            ':name' => [$name, PDO::PARAM_STR],
            ':bio' => [$bio, PDO::PARAM_STR],
            ':password_hash' => [$password_hash, PDO::PARAM_STR],
            ':token' => [$token, PDO::PARAM_STR],
        ];
        $result = Db::prepareAndExecute($sql, null, true);
        if (!$result) {
            /* 失敗 */
            return null;
        }
        /* 成功 */
        $sql2 = 'select * from yuzunoha_sns_user';
        return Db::prepareAndExecute($sql2);
    }

    public static function selectAll()
    {
        $sql = 'select * from yuzunoha_sns_user';
        $stmt = Db::getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectOrderByIdDesc($limit = 25)
    {
        $sql = 'select * from yuzunoha_sns_user ';
        $sql .= 'ORDER BY id DESC ';
        $sql .= 'LIMIT :limit';
        $params = [
            'limit' => [$limit, PDO::PARAM_INT],
        ];
        return Db::prepareAndExecute($sql, $params);
    }
}
