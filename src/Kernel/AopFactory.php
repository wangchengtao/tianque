<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel;

class AopFactory
{
    public static function client(array $config): AopClient
    {
        $config = Config::fromArray($config);

        return new AopClient($config);
    }
}
