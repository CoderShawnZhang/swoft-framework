<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/8
 * Time: 下午12:01
 */

namespace SwoftRewrite\Framework\Contract;
use SwoftRewrite\Annotation\Contract\LoaderInterface;

interface ComponentInterface extends DefinitionInterface,LoaderInterface
{
    public function isEnable();
}