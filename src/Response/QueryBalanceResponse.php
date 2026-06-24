<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 账户余额查询响应.
 *
 * 合作方通过本接口查询商户的账户余额。
 */
class QueryBalanceResponse extends Response
{
    /**
     * 币种.
     */
    public ?string $ccy;

    /**
     * 交易账户总额.
     *
     * 交易账户总额 = 交易结算冻结金额 + 交易风控冻结金额 + 交易账户可用金额
     */
    public ?string $totalAmt;

    /**
     * 交易账户结算冻结金额.
     */
    public ?string $smtBlkAmt;

    /**
     * 交易账户风控冻结金额.
     */
    public ?string $rcBlkAmt;

    /**
     * 交易账户可用金额.
     *
     * 交易账户总额 - 交易结算冻结金额 - 交易风控冻结金额 = 交易可用金额
     * 交易可用金额 = 交易账户当日余额 + 交易账户历史余额
     */
    public ?string $avlAmt;

    /**
     * 商户当日实时收款金额.
     */
    public ?string $dayBl;

    /**
     * 交易账户历史余额.
     *
     * 查询日之前的历史余额
     */
    public ?string $hisBl;

    /**
     * 交易账户留存金额.
     *
     * 商户结算预留金额
     * 在商户设置接口，设置结算预留金额，可用于退款使用
     */
    public ?string $rtnAmt;

    /**
     * 分账账户总额.
     *
     * 单次分账挂起订单的金额
     * 分账账户总额 = 分账账户风控冻结金额 + 分账账户可用金额
     */
    public ?string $subTotalAmt;

    /**
     * 分账账户风控冻结金额.
     */
    public ?string $subRcBlkAmt;

    /**
     * 分账账户可用金额.
     */
    public ?string $subAvlAmt;

    /**
     * 营销账户总额.
     *
     * 增值账户余额 = 增值账户风控冻结金额 + 增值账户结算冻结金额 + 增值账户可用余额
     */
    public ?string $incTotalAmt;

    /**
     * 营销账户风控冻结金额.
     */
    public ?string $incOtherRcBlkAmt;

    /**
     * 营销账户结算冻结金额.
     */
    public ?string $incOtherSmtBlkAmt;

    /**
     * 营销账户可用金额.
     */
    public ?string $incOtherAvlAmt;
}
