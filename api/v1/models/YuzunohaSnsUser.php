<?php

require_once dirname(__FILE__) . '/Db.php';

class YuzunohaSnsUser
{
    public static function insert($name, $bio, $password)
    {
        // 書き中
        $password_hash = hash('sha256', $password);
        $secret = 'ユズノハさんだよ';
        $tokenSeed = $password_hash . microtime() . $secret;
        $token = hash('sha256', $tokenSeed);

        $sql = 'insert into yuzunoha_sns_user ';
        $sql .= '(name, bio, password_hash, token) ';
        $sql .= 'values (:name, :bio, :password_hash, :token)';
        $stmt = Db::getPdo()->prepare($sql);

        $stmt->bindValue(':name', 'd');
        $stmt->bindValue(':bio', 'd');
        $stmt->bindValue(':password_hash', 'd');
        $stmt->bindValue(':token', 'd');

        $stmt->execute();

        $sql2 = 'select * from yuzunoha_sns_user';
        $stmt2 = Db::getPdo()->prepare($sql2);
        $stmt2->execute();
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        return $result;
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
