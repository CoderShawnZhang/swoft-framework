<?php

if($_SERVER['REQUEST_URI'] == '/favicon.ico'){
    return;
}
require dirname(__DIR__) . '/vendor/autoload.php';

$app = new \App\Application();
$app->run();