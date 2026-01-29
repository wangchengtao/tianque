<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

use Summer\TianQue\Kernel\Contract\Arrayable;
use Summer\TianQue\Kernel\Traits\Constructor;
use Summer\TianQue\Kernel\Traits\Serializable;

abstract class Request implements Arrayable
{
    use Constructor;
    use Serializable;

    protected string $method = 'POST';

    protected string $uri;

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
