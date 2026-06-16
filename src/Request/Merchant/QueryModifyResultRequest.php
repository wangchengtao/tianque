<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

/**
 * 商户信息修改结果查询.
 *
 * 合作方调用本接口查询商户信息修改的审核结果。
 */
class QueryModifyResultRequest extends Request
{
    /**
     * @var string 商户信息修改申请ID
     */
    public string $applicationId;

    protected string $uri = '/merchant/queryModifyResult';
}
