<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/8
 * Time: 上午11:35
 */

namespace SwoftRewrite\Framework\Processor;


use SwoftRewrite\Annotation\AnnotationRegister;
use SwoftRewrite\Bean\Annotation\Mapping\Bean;
use SwoftRewrite\Bean\BeanFactory;
use SwoftRewrite\Framework\Contract\ComponentInterface;
use SwoftRewrite\Framework\Contract\DefinitionInterface;
use function SwoftRewrite\Framework\Helper\alias;
use SwoftRewrite\Stdlib\Helper\ArrayHelper;

class BeanProcessor extends Processor
{
    /**
     * @throws \Exception
     */
    public function handle()
    {
        $definitions = $this->getDefinitions();             //所有组件的定义
        $parsers = AnnotationRegister::getParsers();        //AnnotationParser 的注解
        $annotations = AnnotationRegister::getAnnotations();    //其他 的注解

        //扔进容器中使用
        BeanFactory::addDefinitions($definitions);
        BeanFactory::addAnnotations($annotations);
        BeanFactory::addParsers($parsers);

        BeanFactory::init();

       $t = BeanFactory::getBean('DemoT');
       $b = BeanFactory::getBean('DemoA');
       $c = BeanFactory::getBean('DemoC');
//       $F = BeanFactory::getBean('cliApp');
//       $d = BeanFactory::getBean('DemoD');
    }

    /**
     *
     * 获取所有组件 Autoload 定义的 Bean();
     * 注意：组件是实现了  ComponentInterface 和 DefinitionInterface 接口的
     * @return array
     * @throws \Exception
     */
    private function getDefinitions()
    {
        $definitions = [];
        $autoLoaders = AnnotationRegister::getAutoLoaders();
        $disabledLoaders = [];
        foreach($autoLoaders as $autoLoader){
            if(!$autoLoader instanceof DefinitionInterface){
                continue;
            }

            $loaderClass = get_class($autoLoader);

            if(isset($disabledLoaders[$loaderClass])){
                continue;
            }
            if($autoLoader instanceof ComponentInterface && !$autoLoader->isEnable()){
                continue;
            }
            $definitions = ArrayHelper::merge($definitions,$autoLoader->beans());
        }
        return $this->getBeanFile($definitions);
    }

    /**
     * @param $definitions
     * @return array
     * @throws \Exception
     */
    private function getBeanFile($definitions)
    {
        $beanFile = $this->application->getBeanFIle();
        $beanFile = alias($beanFile);

        if(!file_exists($beanFile)){
            throw new \Exception(printf('The Bean config file of %s is not exist!',$beanFile));
        }

        $beanDefinitions = require $beanFile;
        $definitions = ArrayHelper::merge($definitions,$beanDefinitions);
        return $definitions;
    }
}