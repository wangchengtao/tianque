<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Merchant\Model\SplitAccount;
use Summer\TianQue\Request\Request;

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

    /**
     * @var array<string>
     */
    public ?array $agreementPicStr;

    /**
     * @var array<string>
     */
    public ?array $scenesPicStr;

    /**
     * @var array<string>
     */
    public ?array $otherPicStr;

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
        $this->agreementPicStr = $agreementPicStr;
    }

    public function setScenesPicStr(array $scenesPicStr): void
    {
        $this->scenesPicStr = $scenesPicStr;
    }

    public function setOtherPicStr(array $otherPicStr): void
    {
        $this->otherPicStr = $otherPicStr;
    }

    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }
}
