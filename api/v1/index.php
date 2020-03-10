<?php

require_once './util.php';

$url = $_SERVER['REQUEST_URI'];
$path = util::getPathArray($url);
$qs = util::getQSDict($url);
$ret = [
    'url' => $url,
    'path' => $path,
    'qs' => $qs,
];
echo "<pre>";
print_r($ret);
// util::sendResponse($ret);

/* routing */
switch (route) {
    case 'sign_up':
        break;
    case 'sign_in':
        break;
    case 'users':
        break;
    case 'posts':
        break;
    default:
        /* DO NOTHING */
}
