<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/Db.php';

class YuzunohaSnsUser
{
    public static function insert($name, $bio, $email, $password)
    {
        $password_hash = hash('sha256', $password);
        $secret = 'ユズノハさんだよ';
        $tokenSeed = $password_hash . microtime() . $secret;
        $token = hash('sha256', $tokenSeed);

        $sql = 'insert into yuzunoha_sns_user ';
        $sql .= '(name, bio, email, password_hash, token) ';
        $sql .= 'values (:name, :bio, :email, :password_hash, :token)';

        $params = [
            ':name' => [$name, PDO::PARAM_STR],
            ':bio' => [$bio, PDO::PARAM_STR],
            ':email' => [$email, PDO::PARAM_STR],
            ':password_hash' => [$password_hash, PDO::PARAM_STR],
            ':token' => [$token, PDO::PARAM_STR],
        ];
        return Db::prepareAndExecute($sql, $params, true);
    }

    public static function selectAll()
    {
        $sql = 'select * from yuzunoha_sns_user ';
        $sql .= 'order by updated_at desc';
        return Db::prepareAndExecute($sql);
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

    public static function selectWhereEmail($email)
    {
        $sql = 'SELECT * FROM yuzunoha_sns_user WHERE email = :email';
        $params = [
            ':email' => [$email, PDO::PARAM_STR],
        ];
        return Db::prepareAndExecute($sql, $params);
    }

    public static function selectWhereToken($token)
    {
        $sql = 'select * from yuzunoha_sns_user where token = :token';
        $params = [
            ':token' => [$token, PDO::PARAM_STR],
        ];
        return Db::prepareAndExecute($sql, $params);
    }

    public static function selectWhereId(int $userId): array
    {
        $sql = 'select * from yuzunoha_sns_user where id = :userId';
        $params = [
            ':userId' => [$userId, PDO::PARAM_INT],
        ];
        return Db::prepareAndExecute($sql, $params);
    }

    public static function selectWhereLikeQuery($query)
    {
        $sql = 'SELECT * FROM yuzunoha_sns_user WHERE CONCAT(name, bio, email) like :likeQuery ';
        $sql .= 'order by updated_at desc';
        $likeQuery = '%' . $query . '%';
        $params = [
            ':likeQuery' => [$likeQuery, PDO::PARAM_STR],
        ];
        return Db::prepareAndExecute($sql, $params);
    }

    public static function update(int $userId, string $name, string $bio): bool
    {
        $sql = 'update yuzunoha_sns_user ';
        $sql .= 'set name = :name, bio = :bio ';
        $sql .= 'where id = :userId';
        $params = [
            ':userId' => [$userId, PDO::PARAM_INT],
            ':name' => [$name, PDO::PARAM_STR],
            ':bio' => [$bio, PDO::PARAM_STR],
        ];
        return Db::prepareAndExecute($sql, $params, true);
    }
}
