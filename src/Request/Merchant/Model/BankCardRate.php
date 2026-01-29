<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;

class BankCardRate implements Arrayable
{
    /**
     * 21 贷记卡费率；22 借记卡费率；23 借记卡手续费封顶值
     */
    protected string $type;

    /**
     * 刷卡费率(%)/封顶费.
     */
    protected string $rate;

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'rate' => $this->rate,
        ];
    }
}
