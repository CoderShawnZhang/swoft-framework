<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/7
 * Time: 上午10:49
 */

namespace SwoftRewrite\Framework\Processor;


use SwoftRewrite\Bean\BeanFactory;
use SwoftRewrite\Console\CommandRegister;
use SwoftRewrite\Framework\Swoft;

class ConsoleProcessor extends Processor
{
    public function handle()
    {
//        Swoft::trigger('aabbccd',$this);

        $router = BeanFactory::getBean('cliRouter');
        CommandRegister::register($router);

        BeanFactory::getBean('cliApp')->run();
    }
}