<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

use Summer\TianQue\Kernel\Contract\Arrayable;
use Summer\TianQue\Kernel\Traits\Constructor;
use Summer\TianQue\Kernel\Traits\Serializable;

class Response implements Arrayable
{
    use Constructor;
    use Serializable;

    public const SUCCESS = '0000';

    public const FAIL = '0001';

    protected string $bizCode;

    protected string $bizMsg;

    public function getBizCode(): string
    {
        return $this->bizCode;
    }

    public function getBizMsg(): string
    {
        return $this->bizMsg;
    }
}
