<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 商户入驻结果查询响应.
 */
class QueryMerchantInfoResponse extends Response
{
    /**
     * 入驻审核中.
     */
    public const REVIEWING = '0';

    /**
     * 入驻通过.
     */
    public const PASSED = '1';

    /**
     * 入驻驳回.
     */
    public const REJECTED = '2';

    /**
     * 进件申请ID.
     *
     * 进件唯一标识，用此参数通过商户入驻查询接口查询进件审核结果。
     */
    public ?string $applicationId;

    /**
     * 商户编号.
     *
     * 接口响应0000成功时会返回商编。
     */
    public ?string $mno;

    /**
     * 审核状态，枚举值.
     *
     * 0 入驻审核中
     * 1 入驻通过
     * 2 入驻驳回
     */
    public ?string $taskStatus;

    /**
     * 审核结果信息.
     */
    public ?string $suggestion;

    /**
     * 渠道报备信息.
     *
     * 每个元素包含：
     * childNoType - 报备渠道（WX 微信 / ZFB 支付宝 / YL-MNO 银联普通 / WL 网联）
     * repoStatus - 报备状态（01 成功 / 02 失败）
     * channelId - 接入方渠道号
     * childNo - 渠道子商户号
     * errMessage - 报备失败原因
     * aliLevel - 支付宝等级
     */
    public ?array $repoInfo;

    /**
     * 收单机构商编.
     *
     * 每个元素包含：
     * type - 类型（SXF 随行付 / XS 新生）
     * mno - 商编
     */
    public ?array $spInfo;

    /**
     * 获取进件申请ID.
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
     * 获取渠道报备信息.
     */
    public function getRepoInfo(): ?array
    {
        return $this->repoInfo;
    }

    /**
     * 获取收单机构商编.
     */
    public function getSpInfo(): ?array
    {
        return $this->spInfo;
    }
}
