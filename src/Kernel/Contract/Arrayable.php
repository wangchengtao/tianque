<?php

namespace Summer\TianQue\Kernel\Contract;

interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array;
}
