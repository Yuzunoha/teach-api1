<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';

class UsersService
{
    public static function get($qsDict): array
    {
        $query = $qsDict['query'];
        if ($query) {
            /* queryあり */
            $users = YuzunohaSnsUser::selectWhereLikeQuery($query);
        } else {
            /* queryなし */
            $users = YuzunohaSnsUser::selectAll();
        }
        $page = intval($qsDict['page']);
        $limit = intval($qsDict['limit']);
        return util::pageing($users, $page, $limit);
    }

    public static function put(int $id, array $body)
    {
        $name = $body['user_params']['name'];
        $bio = $body['user_params']['bio'];
        // 入力ガード
        if ('' === $name) {
            return new YuzunohaSnsError('nameを入力してください', 400);
        }
        if ('' === $bio) {
            return new YuzunohaSnsError('bioを入力してください', 400);
        }
        /* ガードOK */
        $updateResult = YuzunohaSnsUser::update($id, $name, $bio);
        if (false === $updateResult) {
            return new YuzunohaSnsError('編集に失敗しました', 500);
        }
        /* 成功 */
        return YuzunohaSnsUser::selectWhereId($id)[0];
    }
}
