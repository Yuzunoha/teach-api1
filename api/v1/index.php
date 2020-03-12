<?php

require_once './util.php';

$path = util::getPathArray();
$qs = util::getQSDict();

util::sendResponse([
    "path" => $path,
    "qs" => $qs,
]);
