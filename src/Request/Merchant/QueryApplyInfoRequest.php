<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

class QueryApplyInfoRequest extends Request
{
    protected string $uri = '/merchant/specialApplication/queryApplyInfo';

    /**
     * @var string 申请单号
     */
    protected string $id;

    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
