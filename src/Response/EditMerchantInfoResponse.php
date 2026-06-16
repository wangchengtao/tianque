<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 商户信息修改响应.
 */
class EditMerchantInfoResponse extends Response
{
    /**
     * 商户信息修改申请ID.
     */
    public string $applicationId;

    /**
     * 获取商户信息修改申请ID.
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }
}
