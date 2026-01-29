<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Contract;

interface RandomGenerator
{
    public function generate(): string;
}
