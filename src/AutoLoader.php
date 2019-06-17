<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/17
 * Time: 上午8:54
 */

namespace SwoftRewrite\Framework;

use SwoftRewrite\Annotation\AutoLoader as AnnotationAutoLoader;
use SwoftRewrite\Event\Manager\EventManager;
use SwoftRewrite\Framework\Contract\DefinitionInterface;

class AutoLoader extends AnnotationAutoLoader implements DefinitionInterface
{
    public function getPrefixDirs()
    {
        return [
            __NAMESPACE__ => __DIR__,
        ];
    }

    public function beans()
    {
        return [
            'eventManager'  => [
                'class' => EventManager::class
            ]
        ];
    }
}