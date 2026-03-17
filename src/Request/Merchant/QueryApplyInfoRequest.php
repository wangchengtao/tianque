<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

/**
 * 合作伙伴可以通过此接口查询申请单状态及信息。
 */
class QueryApplyInfoRequest extends Request
{
    /**
     * @var string 申请单号
     */
    public string $id;

    protected string $uri = '/merchant/specialApplication/queryApplyInfo';

    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
