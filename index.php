<?php

require_once "vendor/autoload.php";

define('HOME_FOLDER', __DIR__);
define('TIME_LINE_COUNT',25);

$app = new \Dykyi\Application();
$app->run();