<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

/**
 * 分账协议签署结果查询.
 *
 * 合作方系统可以通过调用本接口查询分账协议签署结果。
 */
class QuerySignContract extends Request
{
    /**
     * 商户编号.
     */
    public string $mno;

    protected string $uri = '/merchant/sign/querySignContract';
}
