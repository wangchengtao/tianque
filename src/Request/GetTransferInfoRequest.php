<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 余额分账结果查询.
 *
 * 合作方系统可以通过调用本接口实现余额分账结果查询
 */
class GetTransferInfoRequest extends Request
{
    /**
     * 商户编号.
     */
    public string $mno;

    /**
     * 商户订单号.
     *
     * 与 tranNo 字段至少传一个
     */
    public ?string $orderNo;

    /**
     * 天阙订单号.
     *
     * 与 orderNo 字段至少传一个
     */
    public ?string $tranNo;

    protected string $uri = '/capital/fundManage/getTransferInfo';

    /**
     * 设置商户编号.
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * 设置商户订单号.
     */
    public function setOrderNo(?string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * 设置天阙订单号.
     */
    public function setTranNo(?string $tranNo): void
    {
        $this->tranNo = $tranNo;
    }
}
