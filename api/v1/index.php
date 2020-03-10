<?php

require_once './util.php';

$currentDirName = array_pop(explode('/', dirname(__FILE__)));
$url = $_SERVER['REQUEST_URI'];
$path = util::getPathArray($url);
$qs = util::getQSDict($url);
$ret = [
    'url' => $url,
    'path' => $path,
    'qs' => $qs,
    'dirname' => $currentDirName
];
echo "<pre>";
print_r($ret);
