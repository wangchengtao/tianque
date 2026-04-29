<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

class GetSignUrlResponse extends Response
{
    /**
     * 签约链接地址
     */
    public ?string $retUrl;
}
