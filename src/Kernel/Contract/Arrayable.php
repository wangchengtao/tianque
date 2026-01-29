<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Contract;

interface Arrayable
{
    /**
     * Get the instance as an array.
     */
    public function toArray(): array;
}
