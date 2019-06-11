<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/7
 * Time: 上午10:48
 */

namespace SwoftRewrite\Framework\Processor;


use SwoftRewrite\Annotation\AnnotationRegister;

class AnnotationProcessor
{
    public function handle()
    {
        AnnotationRegister::load([]);
    }
}