<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/8
 * Time: 下午1:52
 */

return [
    'cliApp' => [
        'class' => \SwoftRewrite\Console\Application::class,
        'version' => '1.0.0'
    ],
    'httpServer' => [
        'class' => \SwoftRewrite\Http\Server\HttpServer::class,
        'port' => 18306,
        'listener' => [

        ],
        'on' => [
            \SwoftRewrite\Server\Swoole\SwooleEvent::REQUEST => \bean(\SwoftRewrite\Http\Server\Swoole\RequestListener::class)
        ],
        'setting'  => [
            'worker_num'       => 1
        ]
    ]
];