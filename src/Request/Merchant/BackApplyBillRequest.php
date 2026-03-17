<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

/**
 * 合作伙伴可以在审核状态为终态之前通过此接口撤销申请单。
 *
 * 接口响应成功即为取消成功，否则会返回失败和原因。
 */
class BackApplyBillRequest extends Request
{
    /**
     * @var string 申请单号
     */
    public string $id;

    protected string $uri = '/merchant/specialApplication/backApplyBill';
}
