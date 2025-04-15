<?php

namespace Summer\TianQue\Response;

use Summer\TianQue\Kernel\Contract\Arrayable;
use Summer\TianQue\Kernel\Traits\Constructor;
use Summer\TianQue\Kernel\Traits\Serializable;

abstract class Response implements Arrayable
{
    use Constructor, Serializable;

    const SUCCESS = '0000';
    const FAIL = '0001';

    protected string $bizCode;

    protected string $bizMsg;

    /**
     * @return string
     */
    public function getBizCode(): string
    {
        return $this->bizCode;
    }

    /**
     * @return string
     */
    public function getBizMsg(): string
    {
        return $this->bizMsg;
    }
}