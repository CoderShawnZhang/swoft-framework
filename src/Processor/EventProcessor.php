<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/11
 * Time: 下午8:16
 */

namespace SwoftRewrite\Framework\Processor;

use SwoftRewrite\Bean\BeanFactory;
use SwoftRewrite\Event\ListenerRegister;
use SwoftRewrite\Framework\Swoft;

class EventProcessor extends Processor
{
    public function handle()
    {
        $EventManager = BeanFactory::getBean('eventManager');
        [$count1,$count2] = ListenerRegister::register($EventManager);

        Swoft::trigger('aabbccdd');
    }
}