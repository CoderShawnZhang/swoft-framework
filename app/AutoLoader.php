<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/11
 * Time: 上午8:52
 */

namespace App;


use SwoftRewrite\Framework\SwoftComponent;

class AutoLoader extends SwoftComponent
{
    public function getPrefixDirs()
    {
        return [
            __NAMESPACE__ => __DIR__,
        ];
    }

    public function beans(): array
    {
        return [];
    }
}