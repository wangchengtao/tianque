<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 账户余额查询.
 *
 * 合作方通过本接口查询商户的账户余额。
 */
class QueryBalanceRequest extends Request
{
    /**
     * 商户编号或机构ID.
     *
     * @var string 长度限制：15
     */
    public string $mno;

    protected string $uri = '/capital/query/queryBalance';
}
