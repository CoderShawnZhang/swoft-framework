<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/12
 * Time: 上午11:56
 */

namespace App;
use SwoftRewrite\Event\Annotation\Mapping\Listener;

/**
 * @Listener(event="aabbccdd")
 */
class DemoListener
{
    /**
     * 绑定事件类 指定 事件委托
     */
    public function handle()
    {
        echo '触发器被触发！';
    }
}