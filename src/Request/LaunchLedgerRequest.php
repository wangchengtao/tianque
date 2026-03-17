<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 订单分账.
 *
 * 合作方系统可以通过调用本接口以订单维度执行分账。
 */
class LaunchLedgerRequest extends Request
{
    /**
     * 分账出款商户编号.
     */
    public string $mno;

    /**
     * 分账对应的原交易商户订单号（字母、数字、下划线）.
     */
    public string $ordNo;

    /**
     * 商户订单号.
     */
    public string $uuid;

    /**
     * 剩余未分账资金是否分账，枚举值
     * 单次分账枚举：
     * 00 取消分账
     * 01 分账.
     *
     * 多次分账枚举：
     * 00 本次分账执行后剩余资金解冻
     * 01 本次分账执行后剩余资金保持冻结
     */
    public string $ledgerAccountFlag;

    /**
     * 分账规则
     * 单次分账：ledgerAccountFlag='00'时不传
     * 单次分账: ledgerAccountFlag='01'时必传
     * 多次分账：ledgerAccountFlag='00'时非必传，若未传入则直接解冻资金
     * 多次分账：ledgerAccountFlag='01'时必传，若传入则本次分账执行后剩余资金保持冻结.
     */
    public ?array $ledgerRule;

    /**
     * 分账结果通知地址，仅多次分账成功时回调.
     */
    public ?string $notifyAddress;

    /**
     * 卡交易订单号
     * 卡交易分账时需通过上游订单号进行分账及交易金额查询.
     */
    public ?string $thirdPartyUuid;

    protected string $uri = '/query/ledger/launchLedger';
}
