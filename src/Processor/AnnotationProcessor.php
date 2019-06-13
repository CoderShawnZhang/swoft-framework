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
        $annotations = AnnotationRegister::getAnnotations();
        $parsers = AnnotationRegister::getParsers();

//$parsers  存的是注解器=>注解器分析类 使用了某个注解器 这个类的分析就使用注解器对应的分析类
//‌array (
//  'SwoftRewrite\\Event\\Annotation\\Mapping\\Listener' => 'SwoftRewrite\\Event\\Annotation\\Parser\\ListenerParser',
//  'SwoftRewrite\\Console\\Annotation\\Mapping\\Command' => 'SwoftRewrite\\Console\\Annotation\\Parser\\CommandParser',
//  'SwoftRewrite\\Bean\\Annotation\\Mapping\\Bean' => 'SwoftRewrite\\Bean\\Annotation\\Parser\\BeanParser',
//)
        $t = 1;
    }
}