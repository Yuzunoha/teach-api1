<?php

require_once dirname(__FILE__) . '/../models/YuzunohaSnsUser.php';

class UsersService
{
    public static function get($qsDict)
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
        if ($page <= 0) {
            $page = 1;
        }
        if ($limit <= 0) {
            $limit = 25;
        }

        $startIdx = $limit * ($page - 1);
        $endIdx = ($limit * $page) - 1;

        $a = [];
        for ($i = $startIdx; $i <= $endIdx && $i < count($users); $i++) {
            $a[] = $users[$i];
        }
        return $a;
    }
}
