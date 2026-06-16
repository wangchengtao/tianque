<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

/**
 * 商户入驻结果查询.
 *
 * 合作方调用本接口查询商户入驻/入驻修改申请的审核结果；
 * 返回审核状态：入驻审核中、入驻通过、入驻驳回；
 * 建议通过轮询方式获取结果。
 */
class QueryMerchantInfoRequest extends Request
{
    /**
     * 进件申请ID.
     */
    public string $applicationId;

    protected string $uri = '/merchant/queryMerchantInfo';

    public function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }
}
