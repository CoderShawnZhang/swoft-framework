<?php

use SwoftRewrite\Framework\Swoft;

if(!function_exists('alias')){
    function alias(string $key)
    {
        return Swoft::getAlias($key);
    }
}