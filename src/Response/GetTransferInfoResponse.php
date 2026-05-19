<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

/**
 * 余额分账结果查询响应.
 */
class GetTransferInfoResponse extends Response
{
    /**
     * 分账成功.
     */
    public const SUCCESS = '00';

    /**
     * 分账失败.
     */
    public const FAILED = '01';

    /**
     * 分账中.
     */
    public const PENDING = '02';

    /**
     * 天阙订单号.
     */
    public ?string $tranNo;

    /**
     * 转入商户编号.
     */
    public ?string $mno;

    /**
     * 余额分账服务费（单位元）.
     *
     * 格式：####.##
     */
    public ?string $rate;

    /**
     * 余额分账金额（单位元）.
     *
     * 格式：####.##
     */
    public ?string $amount;

    /**
     * 备注.
     */
    public ?string $content;

    /**
     * 服务费出资方.
     *
     * 枚举值：
     * 01 服务商出资
     * 02 商户出资
     */
    public ?string $investor;

    /**
     * 余额分账状态
     *
     * 枚举值：
     * 00 成功
     * 01 失败
     * 02 分账中
     */
    public ?string $tranStatus;

    /**
     * 成功时间.
     */
    public ?string $transferTime;

    /**
     * 清算日期.
     */
    public ?string $clrDt;

    /**
     * 获取天阙订单号.
     */
    public function getTranNo(): ?string
    {
        return $this->tranNo;
    }

    /**
     * 获取转入商户编号.
     */
    public function getMno(): ?string
    {
        return $this->mno;
    }

    /**
     * 获取余额分账服务费.
     */
    public function getRate(): ?string
    {
        return $this->rate;
    }

    /**
     * 获取余额分账金额.
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * 获取备注.
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * 获取服务费出资方.
     */
    public function getInvestor(): ?string
    {
        return $this->investor;
    }

    /**
     * 获取余额分账状态.
     */
    public function getTranStatus(): ?string
    {
        return $this->tranStatus;
    }

    /**
     * 获取成功时间.
     */
    public function getTransferTime(): ?string
    {
        return $this->transferTime;
    }

    /**
     * 获取清算日期.
     */
    public function getClrDt(): ?string
    {
        return $this->clrDt;
    }
}
