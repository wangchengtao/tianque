<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

class QuerySignContractResponse extends Response
{
    /**
     * 签约状态，枚举值
     * 00：已发送链接，未签约
     * 01：签约失败
     * 02：签约成功
     * 03：未签约
     * 04：审批中.
     */
    public ?string $signResult;

    /**
     * 签约时间.
     *
     * 签约成功时必返回
     */
    public ?string $signTime;
}
