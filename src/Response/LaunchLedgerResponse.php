<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

use Summer\TianQue\Response\Model\AccountInfo;

class LaunchLedgerResponse extends Response
{
    /**
     * 天阙分账订单号.
     */
    public ?string $ledgerUuid;

    /**
     * 商户分账订单号.
     */
    public ?string $uuid;

    /**
     * 交易手续费原交易订单.
     */
    public ?string $recFeeAmt;

    /**
     * 分账手续费.
     */
    public ?string $ledgerFee;

    /**
     * 分账结果，枚举值
     * 取值范围：
     * 00 分账成功
     * 01 分账失败
     * 05 分账中.
     */
    public ?string $ledgerStatus;

    /**
     * 入账信息.
     * @var array<AccountInfo>
     */
    public ?array $accountInfo;

    /**
     * 分账完成时间.
     */
    public ?string $accountFinishTime;

    /**
     * 分账创建时间.
     */
    public ?string $creDt;
}
