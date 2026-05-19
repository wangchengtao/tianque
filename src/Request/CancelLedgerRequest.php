<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 余额分账撤销.
 *
 * 可调用该接口撤销余额分账订单
 */
class CancelLedgerRequest extends Request
{
    /**
     * 原转账单转出商编.
     */
    public string $mno;

    /**
     * 订单号.
     */
    public string $orderNo;

    /**
     * 备注.
     */
    public ?string $content;

    /**
     * 原商户订单号.
     *
     * 同原天阙订单号二选一必送
     */
    public ?string $origOrderNo;

    /**
     * 原天阙订单号.
     *
     * 同原商户订单号二选一必送
     */
    public ?string $origTransactionId;

    protected string $uri = '/capital/balanceLedger/cancelLedger';

    /**
     * 设置原转账单转出商编.
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * 设置订单号.
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * 设置备注.
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * 设置原商户订单号.
     */
    public function setOrigOrderNo(?string $origOrderNo): void
    {
        $this->origOrderNo = $origOrderNo;
    }

    /**
     * 设置原天阙订单号.
     */
    public function setOrigTransactionId(?string $origTransactionId): void
    {
        $this->origTransactionId = $origTransactionId;
    }
}
