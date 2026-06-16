<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Merchant\Model\BankCardRate;
use Summer\TianQue\Request\Request;

/**
 * 商户刷卡费率设置.
 *
 * 合作方调用本接口设置商户的刷卡交易费率。
 * 费率生效时间：费率修改通常在次日 0 点生效；
 * 适用场景：仅用于刷卡交易费率调整，二维码交易费率请使用「商户产品设置」接口。
 */
class SetCardRateRequest extends Request
{
    /**
     * 商户编号.
     */
    public string $mno;

    /**
     * @var null|BankCardRate[] 刷卡费率
     *
     * 费率单位为%，封顶值单位为元
     *
     * 类型说明：
     * 21 贷记卡费率
     * 22 借记卡费率
     * 23 借记卡手续费封顶值
     * 24 手机闪付贷记卡费率
     * 25 手机闪付借记卡费率
     *
     * 若传入则对应（21，22，23）三个类型必须同时传入
     * 若传入24，则25必须同时传入
     *
     * 未传入则取机构预设的默认进件费率
     */
    public ?array $bankCardRates;

    /**
     * 费率生效类型.
     *
     * 枚举值：
     * 01 次日生效
     * 02 立即生效
     * 不传默认01
     */
    public ?string $qrcodeEffectiveType;

    protected string $uri = '/merchant/setCardRate';

    /**
     * 设置商户编号.
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * 设置刷卡费率.
     *
     * @param null|BankCardRate[] $bankCardRates
     */
    public function setBankCardRates(?array $bankCardRates): void
    {
        $this->bankCardRates = $bankCardRates;
    }

    /**
     * 设置费率生效类型.
     */
    public function setQrcodeEffectiveType(?string $qrcodeEffectiveType): void
    {
        $this->qrcodeEffectiveType = $qrcodeEffectiveType;
    }
}
