<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/6
 * Time: 下午5:46
 */

namespace SwoftRewrite\Framework;


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

    public static function trigger($event,$target = null,...$params)
    {
        return BeanFactory::getSingleton('eventManager')->trigger($event,$target,$params);
    }
}