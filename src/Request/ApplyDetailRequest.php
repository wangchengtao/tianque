<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 申请单查询.
 *
 * 调用项目添加商户接口，为余额分账项目添加商户时会生成审批单，
 * 审批为异步，可调用该接口查询申请单的审批状态
 */
class ApplyDetailRequest extends Request
{
    /**
     * 自定义申请单号.
     */
    public string $applyNo;

    protected string $uri = '/capital/fundProject/applyDetail';

    /**
     * 设置申请单号.
     */
    public function setApplyNo(string $applyNo): void
    {
        $this->applyNo = $applyNo;
    }
}
