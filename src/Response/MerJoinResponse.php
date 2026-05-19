<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 项目添加商户响应.
 */
class MerJoinResponse extends Response
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
     * 获取申请单号.
     */
    public function getApplyNo(): string
    {
        return $this->applyNo;
    }

    /**
     * 获取申请状态
     */
    public function getApplyStatus(): string
    {
        return $this->applyStatus;
    }
}
