<?php

if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/favicon.ico'){
    return false;
}
require_once dirname(__DIR__) . '/vendor/autoload.php';


$app = new \App\Application();
$app->run();