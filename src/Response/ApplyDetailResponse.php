<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 申请单查询响应.
 */
class ApplyDetailResponse extends Response
{
    /**
     * 审核中.
     */
    public const APPLYING = '00';

    /**
     * 审核通过.
     */
    public const PASSED = '01';

    /**
     * 审核驳回.
     */
    public const REJECTED = '02';

    /**
     * 申请单号.
     */
    public string $applyNo;

    /**
     * 申请状态
     *
     * 枚举值：
     * 00 审核中
     * 01 审核通过
     * 02 审核驳回
     */
    public string $applyStatus;

    /**
     * 审核时间.
     *
     * 当状态为 01 或 02 时必返
     */
    public ?string $auditTime;

    /**
     * 会签意见
     */
    public ?string $auditSuggest;

    /**
     * 获取申请单号.
     */
    public function getApplyNo(): string
    {
        return $this->applyNo;
    }

    /**
     * 获取申请状态.
     */
    public function getApplyStatus(): string
    {
        return $this->applyStatus;
    }

    /**
     * 获取审核时间.
     */
    public function getAuditTime(): ?string
    {
        return $this->auditTime;
    }

    /**
     * 获取会签意见.
     */
    public function getAuditSuggest(): ?string
    {
        return $this->auditSuggest;
    }
}
