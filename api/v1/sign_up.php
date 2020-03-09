<?php

require_once './util.php';

$o = util::getRequestJsonObj();

util::sendResponse($o);
