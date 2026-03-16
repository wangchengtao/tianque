<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 分账设置.
 */
class SetMnoArrayRequest extends Request
{
    /**
     * @var string 分账交易商户编号
     */
    public string $mno;

    /**
     * @var string 分账收款商户编号(逗号分隔))
     */
    public string $mnoArray;

    protected string $uri = '/query/ledger/setMnoArray';
}
