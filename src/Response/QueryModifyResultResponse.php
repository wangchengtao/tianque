<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 商户信息修改结果查询响应.
 */
class QueryModifyResultResponse extends Response
{
    /**
     * 商户修改审核中.
     */
    public const REVIEWING = '4';

    /**
     * 商户修改通过.
     */
    public const PASSED = '5';

    /**
     * 商户修改驳回.
     */
    public const REJECTED = '6';

    /**
     * 商户信息修改申请ID.
     */
    public ?string $applicationId;

    /**
     * 商户编号.
     */
    public ?string $mno;

    /**
     * 审核状态，枚举值.
     *
     * 4 商户修改审核中
     * 5 商户修改通过
     * 6 商户修改驳回
     */
    public ?string $taskStatus;

    /**
     * 审核结果信息，驳回原因.
     */
    public ?string $suggestion;

    /**
     * 更新时间.
     */
    public ?string $updatedDate;

    /**
     * 获取商户信息修改申请ID.
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * 获取商户编号.
     */
    public function getMno(): ?string
    {
        return $this->mno;
    }

    /**
     * 获取审核状态.
     */
    public function getTaskStatus(): ?string
    {
        return $this->taskStatus;
    }

    /**
     * 获取审核结果信息.
     */
    public function getSuggestion(): ?string
    {
        return $this->suggestion;
    }

    /**
     * 获取更新时间.
     */
    public function getUpdatedDate(): ?string
    {
        return $this->updatedDate;
    }
}
