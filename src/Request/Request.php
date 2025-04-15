<?php

namespace Summer\TianQue\Request;

use ReflectionClass;
use Summer\TianQue\Kernel\Contract\Arrayable;
use Summer\TianQue\Kernel\Traits\Serializable;

abstract class Request implements Arrayable
{
    use Serializable;

    protected string $method = 'POST';

    protected string $uri;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}