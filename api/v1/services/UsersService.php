<?php

class UsersService
{
  public static function get($qsDict)
  {
    $query = $qsDict['query'];
    if ($query) {
      /* queryあり */
    } else {
      /* queryなし */
    }
    return "queryチェックしたよー";
  }
}
