<?php

require_once dirname(__FILE__) . '/Db.php';

class SignUpModel
{
    public static function signUp()
    {
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
}
