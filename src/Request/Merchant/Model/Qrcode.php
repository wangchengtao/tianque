<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;

class Qrcode implements Arrayable
{
    /**
     * 费率类型.
     *
     * 01 微信（贷记卡）费率
     * 011 微信借记卡费率
     * 012 微信借记卡封顶手续费
     * 02 支付宝（贷记卡）费率
     * 021 支付宝借记卡费率
     * 022 支付宝借记卡封顶手续费
     * 03 翼支付贷记卡费率
     * 031 翼支付借记卡费率
     * 032 翼支付借记卡封顶手续费
     * 06 银联单笔小于1000（贷记卡）费率
     * 061 银联单笔小于1000借记卡费率
     * 07 银联单笔大于1000（贷记卡）费率
     * 071 银联单笔大于1000借记卡费率
     */
    public string $rateType;

    /**
     * 二维码费率(%).
     */
    public string $rate;

    public function setRateType(string $rateType): void
    {
        $this->rateType = $rateType;
    }

    public function setRate(string $rate): void
    {
        $this->rate = $rate;
    }

    public function toArray(): array
    {
        return [
            'rateType' => $this->rateType,
            'rate' => $this->rate,
        ];
    }
}
