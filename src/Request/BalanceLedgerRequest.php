<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

/**
 * 余额分账.
 *
 * 调用进行余额分账操作
 */
class BalanceLedgerRequest extends Request
{
    /**
     * 转出商编.
     */
    public string $mno;

    /**
     * 转入商编.
     */
    public ?string $targetMno;

    /**
     * 服务费出资方.
     *
     * 枚举值：
     * 01 转出方出资
     * 02 接收方出资
     * 默认 01
     */
    public string $investor = '01';

    /**
     * 转账规则.
     *
     * 枚举值：
     * 00 默认：优先从分出方当日余额分出，入接收方当日余额；（如分出方当日余额不足时，会使用历史余额）
     * 01 历史：从分出方历史余额分出，入接收方历史余额
     */
    public string $accountRule = '00';

    /**
     * 订单号.
     */
    public string $orderNo;

    /**
     * 转账金额.
     *
     * 单位元，保留两位小数
     */
    public string $amount;

    /**
     * 备注.
     */
    public ?string $content;

    /**
     * 项目编号.
     */
    public string $projectNo;

    protected string $uri = '/capital/balanceLedger/ledger';

    /**
     * 设置转出商编.
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * 设置转入商编.
     */
    public function setTargetMno(?string $targetMno): void
    {
        $this->targetMno = $targetMno;
    }

    /**
     * 设置服务费出资方.
     */
    public function setInvestor(?string $investor): void
    {
        $this->investor = $investor;
    }

    /**
     * 设置转账规则.
     */
    public function setAccountRule(?string $accountRule): void
    {
        $this->accountRule = $accountRule;
    }

    /**
     * 设置订单号.
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * 设置转账金额.
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * 设置备注.
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * 设置项目编号.
     */
    public function setProjectNo(string $projectNo): void
    {
        $this->projectNo = $projectNo;
    }
}
