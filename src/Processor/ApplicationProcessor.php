<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/6
 * Time: 下午5:51
 */

namespace SwoftRewrite\Framework\Processor;


class ApplicationProcessor
{
    private $processors = [];

    public function handle()
    {
        foreach($this->processors as $processor){
            $processor->handle();
        }
    }

    public function addFirstProcessor(...$processor)
    {

        array_unshift($this->processors,...$processor);
        return true;
    }
}