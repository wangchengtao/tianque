<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 余额分账响应.
 */
class BalanceLedgerResponse extends Response
{
    /**
     * 转账成功.
     */
    public const SUCCESS = '00';

    /**
     * 转账失败.
     */
    public const FAILED = '01';

    /**
     * 中间态.
     */
    public const PENDING = '02';

    /**
     * 备注.
     */
    public ?string $content;

    /**
     * 天阙订单号.
     */
    public ?string $transactionNo;

    /**
     * 转账时间.
     */
    public ?string $transactionTime;

    /**
     * 清算日期.
     */
    public ?string $clrDt;

    /**
     * 商户订单号.
     */
    public ?string $orderNo;

    /**
     * 转账结果.
     *
     * 枚举值：
     * 00 成功
     * 01 失败
     * 02 中间态
     */
    public ?string $tranStatus;

    /**
     * 获取备注.
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * 获取天阙订单号.
     */
    public function getTransactionNo(): ?string
    {
        return $this->transactionNo;
    }

    /**
     * 获取转账时间.
     */
    public function getTransactionTime(): ?string
    {
        return $this->transactionTime;
    }

    /**
     * 获取清算日期.
     */
    public function getClrDt(): ?string
    {
        return $this->clrDt;
    }

    /**
     * 获取商户订单号.
     */
    public function getOrderNo(): ?string
    {
        return $this->orderNo;
    }

    /**
     * 获取转账结果.
     */
    public function getTranStatus(): ?string
    {
        return $this->tranStatus;
    }
}
