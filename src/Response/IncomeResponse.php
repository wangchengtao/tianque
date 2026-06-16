<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 商户入驻响应.
 */
class IncomeResponse extends Response
{
    /**
     * 进件申请ID
     * 进件唯一标识，用此参数通过商户入驻查询接口查询进件审核结果。
     */
    public string $applicationId;

    /**
     * 商户编号
     * 接口响应0000成功时会返回商编。
     * 默认审核状态是审核中，需通过商户入驻结果查询接口查询审核结果。
     */
    public ?string $mno;
}
