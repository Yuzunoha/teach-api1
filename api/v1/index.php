<?php

require_once './util.php';

$url = $_SERVER['REQUEST_URI'];
$path = util::getPathArray($url);
$qs = util::getQSDict($url);
$ret = [
  'url' => $url,
  'path' => $path,
  'qs' => $qs
];
util::sendResponse($ret);
