<?php

require_once './util.php';

$path = util::getPathArray();
$qs = util::getQSDict();
$ret = [
    'path' => $path,
    'qs' => $qs,
];
echo "<pre>";
print_r($ret);
