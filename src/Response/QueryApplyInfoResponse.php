<?php

namespace Summer\TianQue\Response;

class QueryApplyInfoResponse extends Response
{
    const APPLYING = '00'; // 申请审核中
    const PASSED = '01'; // 申请通过
    const REJECTED = '02'; // 申请驳回
    const CANCELLED = '03'; // 申请取消

    protected string $id;

    protected string $applicationType;

    protected string $mno;

    protected string $applyStatus;

    protected string $handleExplain;

    // --------------------------------------------------- 分时结算申请

    protected string $paymentSet;

    protected string $settTime;

    // ---------------------------------------------------- 账户结算申请

    protected string $accountRatio;
}