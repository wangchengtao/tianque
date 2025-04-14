<?php

namespace Summer\TianQue\Response;

use ReflectionClass;
use Summer\TianQue\Kernel\Trait\Constructor;

abstract class Response
{
    use Constructor;

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