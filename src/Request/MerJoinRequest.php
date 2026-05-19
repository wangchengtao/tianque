<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 项目添加商户.
 *
 * 创建余额分账项目后，为余额分账项目添加余额分账商户
 */
class MerJoinRequest extends Request
{
    /**
     * 自定义申请单号.
     *
     * 申请单号只支持字母、数字、下划线和"-"
     */
    public string $applyNo;

    /**
     * 项目编号.
     */
    public string $projectNo;

    /**
     * 商户编号.
     */
    public string $mno;

    /**
     * 是否开通余额分账.
     *
     * 枚举值：
     * 00 不开通
     * 01 开通
     * 不传默认 00
     */
    public string $balanceLedgerFlag = '00';

    /**
     * 业务说明函.
     *
     * balanceLedgerFlag=01 时必填
     * 支持五张图片或文件，以英文逗号分隔
     */
    public ?string $businessDescPicId;

    /**
     * 其他佐证材料.
     *
     * 支持五张图片或文件，以英文逗号分隔
     */
    public ?string $otherProvePicId;

    /**
     * 角色.
     *
     * 枚举值：
     * 00 品牌总部
     * 01 门店
     * 02 供应商
     * 03 平台
     * 04 分销方
     * 05 服务商
     */
    public string $role;

    /**
     * 余额分账费率(%).
     *
     * 精确到小数点后两位，取值范围[0.00,1]
     * 最低不得低于机构成本费率
     * 不传默认取机构签约费率
     */
    public ?string $balanceFeeRate;

    /**
     * 商户的保底服务费(元).
     *
     * 精确到小数点后两位
     * 不传默认取机构保底服务费
     */
    public ?string $balanceMinFee;

    /**
     * 商户的封顶服务费(元).
     *
     * 精确到小数点后两位
     * 不封顶传 99999.99
     * 不传默认取机构封顶服务费
     */
    public ?string $balanceMaxFee;

    /**
     * 备注.
     */
    public ?string $remark;

    /**
     * 回调地址
     */
    public ?string $callbackUrl;

    protected string $uri = '/capital/fundProject/merJoin';

    /**
     * 设置申请单号.
     */
    public function setApplyNo(string $applyNo): void
    {
        $this->applyNo = $applyNo;
    }

    /**
     * 设置项目编号.
     */
    public function setProjectNo(string $projectNo): void
    {
        $this->projectNo = $projectNo;
    }

    /**
     * 设置商户编号.
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * 设置是否开通余额分账.
     */
    public function setBalanceLedgerFlag(?string $balanceLedgerFlag): void
    {
        $this->balanceLedgerFlag = $balanceLedgerFlag;
    }

    /**
     * 设置业务说明函.
     *
     * @param array|string $businessDescPicId 图片ID数组或逗号分隔的字符串
     */
    public function setBusinessDescPicId($businessDescPicId): void
    {
        if (is_array($businessDescPicId)) {
            $this->businessDescPicId = implode(',', $businessDescPicId);
        } else {
            $this->businessDescPicId = $businessDescPicId;
        }
    }

    /**
     * 设置其他佐证材料.
     *
     * @param array|string $otherProvePicId 图片ID数组或逗号分隔的字符串
     */
    public function setOtherProvePicId($otherProvePicId): void
    {
        if (is_array($otherProvePicId)) {
            $this->otherProvePicId = implode(',', $otherProvePicId);
        } else {
            $this->otherProvePicId = $otherProvePicId;
        }
    }

    /**
     * 设置角色.
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * 设置余额分账费率.
     */
    public function setBalanceFeeRate(?string $balanceFeeRate): void
    {
        $this->balanceFeeRate = $balanceFeeRate;
    }

    /**
     * 设置保底服务费.
     */
    public function setBalanceMinFee(?string $balanceMinFee): void
    {
        $this->balanceMinFee = $balanceMinFee;
    }

    /**
     * 设置封顶服务费.
     */
    public function setBalanceMaxFee(?string $balanceMaxFee): void
    {
        $this->balanceMaxFee = $balanceMaxFee;
    }

    /**
     * 设置备注.
     */
    public function setRemark(?string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * 设置回调地址
     */
    public function setCallbackUrl(?string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }
}
