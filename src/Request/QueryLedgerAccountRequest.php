<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 分账结果查询.
 *
 * 合作方系统可以通过调用本接口查询分账结果。
 */
class QueryLedgerAccountRequest extends Request
{
    /**
     * @var string 分账出款商户编号
     */
    public string $mno;

    /**
     * 商户分账订单号.
     *
     * 同步分账&单次分账ordNo、uuid、ledgerUuid三选一必传
     * 多次分账uuid、ledgerUuid任选一必传.
     */
    public ?string $uuid;

    /**
     * 原交易商户订单号.
     *
     * 同步分账&单次分账ordNo、uuid、ledgerUuid三选一必传.
     */
    public ?string $ordNo;

    /**
     * 天阙分账单号.
     *
     * 同步分账&单次分账ordNo、uuid、ledgerUuid三选一必传
     * 多次分账uuid、ledgerUuid任选一必传.
     */
    public ?string $ledgerUuid;

    /**
     * 退款订单号.
     *
     * 同步分账&查询同步分账、单次分账交易退分账明细时使用
     */
    public ?string $refundOrdNo;

    /**
     * 卡交易订单号.
     *
     * 卡交易分账时需通过上游订单号进行分账及交易金额查询
     */
    public ?string $thirdPartyUuid;

    /**
     * 卡交易标识.
     *
     * 卡交易的分账回退及查询必送，枚举00
     */
    public ?string $isCardLedge;

    protected string $uri = '/query/ledger/queryLedgerAccount';
}
