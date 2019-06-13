<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/8
 * Time: 上午11:59
 */

namespace SwoftRewrite\Framework;


use SwoftRewrite\Framework\Contract\ComponentInterface;

abstract class SwoftComponent implements ComponentInterface
{
    private $enable;

    public function __construct()
    {
        $this->enable = $this->enable();
    }

    public function isEnable()
    {
        return $this->enable;
    }

    public function enable()
    {
        $this->enable = true;
    }

    public function beans(): array
    {
        return [];
    }
}