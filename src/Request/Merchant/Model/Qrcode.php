<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;

class Qrcode implements Arrayable
{
    /**
     * 01 微信费率；02 支付宝费率；06 银联单笔小于等于1000费率；07 银联单笔大于1000费率.
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
