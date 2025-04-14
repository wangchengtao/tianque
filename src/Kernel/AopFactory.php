<?php

namespace Summer\TianQue\Kernel;

class AopFactory
{
    public static function client(array $config): AopClient
    {
        $config = Config::fromArray($config);

        return new AopClient($config);
    }
}