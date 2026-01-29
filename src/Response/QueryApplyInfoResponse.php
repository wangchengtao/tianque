<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

class QueryApplyInfoResponse extends Response
{
    public const APPLYING = '00'; // 申请审核中

    public const PASSED = '01'; // 申请通过

    public const REJECTED = '02'; // 申请驳回

    public const CANCELLED = '03'; // 申请取消

    public string $id;

    public string $applicationType;

    public string $mno;

    public string $applyStatus;

    public string $handleExplain;

    // --------------------------------------------------- 分时结算申请

    public string $paymentSet;

    public string $settTime;

    // ---------------------------------------------------- 账户结算申请

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
