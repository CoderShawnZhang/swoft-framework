<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/8
 * Time: 下午12:49
 */

namespace SwoftRewrite\Framework\Helper;

use SwoftRewrite\Framework\Swoft;

function alias(string $key)
{
    return Swoft::getAlias($key);
}