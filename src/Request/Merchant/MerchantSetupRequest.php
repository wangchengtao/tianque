<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Merchant\Model\Qrcode;
use Summer\TianQue\Request\Request;

/**
 * 商户产品设置.
 *
 * 合作方调用本接口修改商户的产品功能配置；
 * 本接口为同步流程，调用成功实时生效；
 * 与「商户信息修改」接口的区别：信息修改为异步+人工审核，本接口为同步+即时生效。
 *
 * 注意事项：
 * 1. 费率生效时间：除费率外，其他配置修改调用成功即生效；费率修改次日 0 点生效；
 * 2. 适用场景：适合修改产品开关、功能配置等不需要人工审核的场景；
 * 3. 不适用场景：涉及商户基本信息变更（如名称、证照等）请使用「商户信息修改」接口。
 */
class MerchantSetupRequest extends Request
{
    /**
     * 商户编号.
     */
    public string $mno;

    /**
     * @var null|Qrcode[] 二维码费率(%)
     *
     * rateType 枚举值，支持以下组合方式：
     *
     * 组合一（4项）：
     * 01 微信费率
     * 02 支付宝费率
     * 06 银联单笔小于等于1000费率
     * 07 银联单笔大于1000费率
     *
     * 组合二（6项）：
     * 01 微信费率
     * 02 支付宝费率
     * 06 银联单笔小于1000贷记卡费率
     * 061 银联单笔小于1000借记卡费率
     * 07 银联单笔大于1000贷记卡费率
     * 071 银联单笔大于1000借记卡费率
     *
     * 组合三（10项）：
     * 01 微信贷记卡费率
     * 011 微信借记卡费率
     * 012 微信借记卡封顶手续费
     * 02 支付宝贷记卡费率
     * 021 支付宝借记卡费率
     * 022 支付宝借记卡封顶手续费
     * 06 银联单笔小于1000贷记卡费率
     * 061 银联单笔小于1000借记卡费率
     * 07 银联单笔大于1000贷记卡费率
     * 071 银联单笔大于1000借记卡费率
     *
     * 组合四（13项）：
     * 01 微信贷记卡费率
     * 011 微信借记卡费率
     * 012 微信借记卡封顶手续费
     * 02 支付宝贷记卡费率
     * 021 支付宝借记卡费率
     * 022 支付宝借记卡封顶手续费
     * 03 翼支付贷记卡费率
     * 031 翼支付借记卡费率
     * 032 翼支付借记卡封顶手续费
     * 06 银联单笔小于1000贷记卡费率
     * 061 银联单笔小于1000借记卡费率
     * 07 银联单笔大于1000贷记卡费率
     * 071 银联单笔大于1000借记卡费率
     */
    public ?array $qrcodeList;

    /**
     * 结算类型.
     *
     * 枚举值：
     * 03 T1结算
     * 04 D1结算
     * 05 关闭自动结算产品
     */
    public ?string $settleType;

    /**
     * 支持的交易类型.
     *
     * 枚举值：
     * 01 主扫
     * 02 被扫
     * 03 公众号/小程序/服务窗/银联JS
     * 04 退货
     * 多选时用逗号间隔，不传默认全部开通
     *
     * @var null|string 逗号分隔的交易类型字符串
     */
    public ?string $supportTradeTypes;

    /**
     * 商户账号权限.
     *
     * 枚举值：
     * 01 开通
     * 短信发送商户账户密码，商户可登录平台查询交易、开发票等功能
     */
    public ?string $mecAuthority;

    /**
     * 商户起始结算金额（元）.
     *
     * 格式 #########.##
     */
    public ?string $startSettleAmt;

    /**
     * 商户结算预留金额（元）.
     *
     * 格式 #########.##
     */
    public ?string $reserveSettleAmt;

    /**
     * 附言开关.
     *
     * 枚举值：
     * 00 关闭
     * 01 结算日期和手续费
     * 02 商户编号
     * 03 商户名称
     * 00和其他枚举互斥不可同时传入，其他枚举可同时传入，
     * 同时传入时需使用英文逗号分隔，商户结算附言将按照枚举传入顺序灵活展示
     */
    public ?string $merAnnex;

    /**
     * 增值账户类型.
     *
     * 枚举值：
     * 10
     * 增值账户类型与增值账户状态需同时传入，
     * 用于营销资金转账与商户收入结算两笔到账设置
     */
    public ?string $incAccount;

    /**
     * 增值账户状态.
     *
     * 枚举值：
     * 01 关闭
     * 02 开通
     * 增值账户类型与增值账户状态需同时传入，
     * 用于营销资金转账与商户收入结算两笔到账设置
     */
    public ?string $incAccountSts;

    protected string $uri = '/merchant/merchantSetup';

    // --------------------------------------Setter 方法--------------------------------------

    /**
     * 设置商户编号.
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * 设置二维码费率列表.
     *
     * @param null|Qrcode[] $qrcodeList
     */
    public function setQrcodeList(?array $qrcodeList): void
    {
        $this->qrcodeList = $qrcodeList;
    }

    /**
     * 设置结算类型.
     */
    public function setSettleType(?string $settleType): void
    {
        $this->settleType = $settleType;
    }

    /**
     * 设置支持的交易类型.
     *
     * @param array|string $supportTradeTypes 交易类型数组或逗号分隔的字符串
     */
    public function setSupportTradeTypes($supportTradeTypes): void
    {
        if (is_array($supportTradeTypes)) {
            $this->supportTradeTypes = implode(',', $supportTradeTypes);
        } else {
            $this->supportTradeTypes = $supportTradeTypes;
        }
    }

    /**
     * 设置商户账号权限.
     */
    public function setMecAuthority(?string $mecAuthority): void
    {
        $this->mecAuthority = $mecAuthority;
    }

    /**
     * 设置商户起始结算金额.
     */
    public function setStartSettleAmt(?string $startSettleAmt): void
    {
        $this->startSettleAmt = $startSettleAmt;
    }

    /**
     * 设置商户结算预留金额.
     */
    public function setReserveSettleAmt(?string $reserveSettleAmt): void
    {
        $this->reserveSettleAmt = $reserveSettleAmt;
    }

    /**
     * 设置附言开关.
     *
     * @param array|string $merAnnex 附言枚举数组或逗号分隔的字符串
     */
    public function setMerAnnex($merAnnex): void
    {
        if (is_array($merAnnex)) {
            $this->merAnnex = implode(',', $merAnnex);
        } else {
            $this->merAnnex = $merAnnex;
        }
    }

    /**
     * 设置增值账户类型.
     */
    public function setIncAccount(?string $incAccount): void
    {
        $this->incAccount = $incAccount;
    }

    /**
     * 设置增值账户状态.
     */
    public function setIncAccountSts(?string $incAccountSts): void
    {
        $this->incAccountSts = $incAccountSts;
    }
}
