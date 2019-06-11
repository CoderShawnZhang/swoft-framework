<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/6
 * Time: 下午5:55
 */

namespace SwoftRewrite\Framework\Processor;


use SwoftRewrite\Framework\SwoftApplication;

class Processor
{
    protected $application;
    public function __construct(SwoftApplication $application)
    {
        $this->application = $application;
    }
}