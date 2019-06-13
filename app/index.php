<?php

require dirname(__DIR__) . '/vendor/autoload.php';

if($_SERVER['REQUEST_URI'] == '/favicon.ico'){
    return false;
}

$app = new \App\Application();
$app->run();

$cliApp = \SwoftRewrite\Bean\BeanFactory::getBean('cliApp');
$eventManager = \SwoftRewrite\Bean\BeanFactory::getBean('eventManager');
$T= 23;


\SwoftRewrite\Framework\Swoft::trigger('aabbccdd');