<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/6
 * Time: 下午5:43
 */

namespace SwoftRewrite\Framework;


use SwoftRewrite\Framework\Processor\AnnotationProcessor;
use SwoftRewrite\Framework\Processor\ApplicationProcessor;
use SwoftRewrite\Framework\Processor\BeanProcessor;
use SwoftRewrite\Framework\Processor\ConsoleProcessor;
use SwoftRewrite\Framework\Processor\EventProcessor;
use SwoftRewrite\Stdlib\Helper\ComposerHelper;
use SwoftRewrite\Stdlib\Helper\Str;

class SwoftApplication
{
    private $processor;

    protected $basePath = '';

    protected $beanFile = '@app/bean.php';
    protected $appPath = '@base/app';
    protected $configPath = '@base/config';
    protected $runtimePath = '@base/runtime';
    protected $resourcePath = '@base/resource';


    public function __construct()
    {
        Swoft::$app = $this;

        $this->beforeInit();
        $this->finBasePath();
        $this->setSystemAlias();

        $processors = $this->processors();
        $this->processor = new ApplicationProcessor();
        $this->processor->addFirstProcessor(...$processors);
    }

    public function run()
    {
        $this->processor->handle();
    }

    private function processors()
    {
        return [
            new AnnotationProcessor($this),
            new BeanProcessor($this),
            new ConsoleProcessor($this),
            new EventProcessor($this),
        ];
    }

    public function getBeanFIle()
    {
        return $this->beanFile;
    }


    public function getBasePath()
    {
        return $this->basePath;
    }
    public function getAppPath()
    {
        return $this->appPath;
    }
    public function getConfigPath()
    {
        return $this->configPath;
    }
    public function getRuntimePath()
    {
        return $this->runtimePath;
    }
    public function getResourcePath()
    {
        return $this->resourcePath;
    }

    protected function beforeInit()
    {
        if(!defined('IN_PHAR')){
            define('IN_PHAR',false);
        }
    }

    private function finBasePath()
    {
        $filePath = ComposerHelper::getClassLoader()->findFile(static::class);
        if(IN_PHAR){
            $filePath = Str::rmPharPrefix($filePath);
        }
        $this->basePath = dirname(realpath($filePath),2);
    }

    private function setSystemAlias()
    {
        $basePath = $this->getBasePath();
        $appPath = $this->getAppPath();

        Swoft::setAlias('@base',$basePath);
        Swoft::setAlias('@app',$appPath);
    }
}