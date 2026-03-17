<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

use Summer\TianQue\Response\Model\AccountInfo;

class QueryLedgerAccountResponse extends Response
{
    /**
     * 天阙分账订单号
     * 分账成功时必返（包含完成分账）.
     */
    public ?string $ledgerUuid;

    /**
     * 商户分账订单号
     * 分账成功时必返（包含完成分账）.
     */
    public ?string $uuid;

    /**
     * 分账单类型，枚举值
     * 取值范围：
     * 07 分账
     * 08 回退
     */
    public string $ledgerType;

    /**
     * 正交易手续费.
     */
    public ?string $recFeeAmt;

    /**
     * 分账手续费.
     */
    public ?string $ledgerFee;

    /**
     * 是否已完成分账, 枚举值
     * 取值范围：
     * 00 已完成分账
     * 01 未完成分账.
     */
    public ?string $accountResult;

    /**
     * 分账结果, 枚举值
     * 取值范围：
     * 00 分账成功
     * 01 分账失败
     * 05 分账中.
     */
    public ?string $ledgerStatus;

    /**
     * 分账完成时间.
     */
    public ?string $accountFinishTime;

    /**
     * 入账信息
     * 仅展示分账收款方/回退出款方明细.
     */
    public ?AccountInfo $accountInfo = null;

    /**
     * 分账创建时间.
     */
    public ?string $creDt;
}
