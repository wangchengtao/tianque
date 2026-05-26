<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

class QueryApplyInfoResponse extends Response
{
    public const APPLYING = '00'; // 申请审核中

    public const PASSED = '01'; // 申请通过

    public const REJECTED = '02'; // 申请驳回

    public const CANCELLED = '03'; // 申请取消

    /**
     * 申请单号.
     */
    public string $id;

    /**
     * 申请类型，枚举：
     * 1 分时结算申请
     * 2 订单分账申请.
     */
    public string $applicationType;

    public string $mno;

    /**
     * 申请状态，枚举值：
     * 00 申请审核中
     * 01 申请通过
     * 02 申请驳回
     * 03 申请取消.
     */
    public string $applyStatus;

    /**
     * 处理说明.
     */
    public string $handleExplain = '';

    // --------------------------------------------------- 分时结算申请

    /**
     * 定时切批付款设置，枚举值：
     * 0 当日付款
     * 1 次日付款.
     */
    public string $paymentSet;

    /**
     * 切批时间
     * 当日付款：01-12 整数
     * 次日付款：00-23整数.
     */
    public string $settTime;

    // ---------------------------------------------------- 订单分账申请

    /**
     * 商户最大分账比例.
     */
    public string $accountRatio;

    public function getId(): string
    {
        return $this->id;
    }

    public function getApplicationType(): string
    {
        return $this->applicationType;
    }

    public function getMno(): string
    {
        return $this->mno;
    }

    public function getApplyStatus(): string
    {
        return $this->applyStatus;
    }

    public function getHandleExplain(): string
    {
        return $this->handleExplain;
    }

    public function getPaymentSet(): string
    {
        return $this->paymentSet;
    }

    public function getSettTime(): string
    {
        return $this->settTime;
    }

    public function getAccountRatio(): string
    {
        return $this->accountRatio;
    }
}
