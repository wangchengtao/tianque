<?php

declare(strict_types=1);

namespace Summer\TianQue\Response\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;
use Summer\TianQue\Kernel\Traits\Constructor;

class AccountInfo implements Arrayable
{
    use Constructor;

    /**
     * 分账收款商编.
     */
    public string $mno;

    /**
     * 分账收款金额.
     */
    public string $allotValue;

    /**
     * 分账流水号.
     */
    public string $ruleId;

    public function toArray(): array
    {
        return [
            'mno' => $this->mno,
            'allotValue' => $this->allotValue,
            'ruleId' => $this->ruleId,
        ];
    }
}
