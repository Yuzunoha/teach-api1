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
        return util::pageing($users, $page, $limit);
    }
}
