<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/6
 * Time: 下午5:46
 */

namespace SwoftRewrite\Framework;


use SwoftRewrite\Bean\Container;
use SwoftRewrite\Http\Server\HttpServer;
use SwoftRewrite\Server\Server;
use SwoftRewrite\Stdlib\Reflections;
use SwoftRewrite\Bean\BeanFactory;
use SwoftRewrite\Framework\Concern\PathAliasTrait;

class Swoft
{
    use PathAliasTrait;

    public const VERSION = '1.0.0';

    public const FONT_LOGO = "
~~~~~~         
    ";
    public static $app;

    public static function app()
    {
        return self::$app;
    }

    /**
     *
     * @return HttpServer|Server
     */
    public static function server()
    {
        return Server::getServer();
    }

    /**
     *
     * @return \Swoole\Http\Server
     */
    public static function swooleServer()
    {
        return self::server()->getSwooleServer();
    }

    public static function trigger($event,$target = null,...$params)
    {
        return BeanFactory::getSingleton('eventManager')->trigger($event,$target,$params);
    }

    public static function getReflection(string $class)
    {
        return Reflections::get($class);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public static function getSingleton(string $name)
    {
        return Container::$instance->getSingleton($name);
    }
}