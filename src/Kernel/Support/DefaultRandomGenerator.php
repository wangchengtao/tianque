<?php

namespace Summer\TianQue\Kernel\Support;

use Summer\TianQue\Kernel\Contract\RandomGenerator;

class DefaultRandomGenerator implements RandomGenerator
{
    public function generate(): string
    {
        return microtime(true) * 1000;
    }
}