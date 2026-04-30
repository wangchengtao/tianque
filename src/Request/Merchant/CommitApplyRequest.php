<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Merchant\Model\SplitAccount;
use Summer\TianQue\Request\Request;

/**
 * 商户如有特殊申请可通过此接口进行提交。
 * 分时结算申请：
 * 商户默认的结算方式为每日0点结算前一日交易，若商户经营时段跨0点，可通过此接口申请设置分时结算时间。
 * 订单分账申请：
 * 商户开通订单分账需进行审批，请您准备好审批材料后进行分账申请。
 */
class CommitApplyRequest extends Request
{
    public const SETTLEMENT = '1'; // 分时结算

    public const SPLIT = '2'; // 分账

    public string $applicationType;

    public string $mno;

    public ?string $callbackUrl;

    // -------------------------------------------------------------- 分时结算申请

    public ?string $paymentSet;

    public ?string $settTime;

    public ?string $settleAccount;

    public ?string $licensePictureUrl;

    public ?string $assistPictureUrlStr;

    public ?string $operaReason;

    // -------------------------------------------------------------- 订单分账申请

    public ?string $accountRatio;

    /**
     * @var array<SplitAccount>
     */
    public ?array $splitAccounts;

    public ?string $agreementPicStr;

    public ?string $scenesPicStr;

    public ?string $otherPicStr;

    public ?string $remark;

    protected string $uri = '/merchant/specialApplication/commitApply';

    public function setApplicationType(string $applicationType): void
    {
        $this->applicationType = $applicationType;
    }

    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    public function setCallbackUrl(string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function setPaymentSet(string $paymentSet): void
    {
        $this->paymentSet = $paymentSet;
    }

    public function setSettTime(string $settTime): void
    {
        $this->settTime = $settTime;
    }

    public function setSettleAccount(string $settleAccount): void
    {
        $this->settleAccount = $settleAccount;
    }

    public function setLicensePictureUrl(string $licensePictureUrl): void
    {
        $this->licensePictureUrl = $licensePictureUrl;
    }

    public function setAssistPictureUrlStr(string $assistPictureUrlStr): void
    {
        $this->assistPictureUrlStr = $assistPictureUrlStr;
    }

    public function setOperaReason(string $operaReason): void
    {
        $this->operaReason = $operaReason;
    }

    public function setAccountRatio(string $accountRatio): void
    {
        $this->accountRatio = $accountRatio;
    }

    public function setSplitAccounts(array $splitAccounts): void
    {
        $this->splitAccounts = $splitAccounts;
    }

    public function setAgreementPicStr(array $agreementPicStr): void
    {
        $this->agreementPicStr = implode(',', $agreementPicStr);
    }

    public function setScenesPicStr(array $scenesPicStr): void
    {
        $this->scenesPicStr = implode(',', $scenesPicStr);
    }

    public function setOtherPicStr(array $otherPicStr): void
    {
        $this->otherPicStr = implode(',', $otherPicStr);
    }

    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }
}
