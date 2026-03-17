<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;
use Summer\TianQue\Kernel\Traits\Constructor;

/**
 * 订单分账规则.
 */
class LedgerRule implements Arrayable
{
    use Constructor;

    /**
     * 分账具体金额.
     */
    public string $allotValue;

    /**
     * 分账收款商编.
     */
    public string $mno;

    public function toArray(): array
    {
        return [
            'allotValue' => $this->allotValue,
            'mno' => $this->mno,
        ];
    }
}
