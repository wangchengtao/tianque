<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 余额分账撤销响应.
 */
class CancelLedgerResponse extends Response
{
    /**
     * 撤销成功.
     */
    public const SUCCESS = '00';

    /**
     * 撤销失败.
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
     * 原商户订单号.
     */
    public string $origOrderNO;

    /**
     * 原天阙订单号.
     */
    public ?string $origTransactionId;

    /**
     * 撤销时间.
     */
    public ?string $transactionTime;

    /**
     * 清算日期.
     */
    public ?string $clrDt;

    /**
     * 商户订单号.
     */
    public string $orderNo;

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
     * 撤销金额.
     */
    public string $amount;

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
     * 获取原商户订单号.
     */
    public function getOrigOrderNO(): string
    {
        return $this->origOrderNO;
    }

    /**
     * 获取原天阙订单号.
     */
    public function getOrigTransactionId(): ?string
    {
        return $this->origTransactionId;
    }

    /**
     * 获取撤销时间.
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
    public function getOrderNo(): string
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

    /**
     * 获取撤销金额.
     */
    public function getAmount(): string
    {
        return $this->amount;
    }
}
