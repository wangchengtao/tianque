<?php

namespace Summer\TianQue\Request;

use Summer\TianQue\Kernel\Attribute\JsonIgnore;
use Summer\TianQue\Request\Model\SplitAccount;

class CommitApplyRequest extends Request
{
    const SETTLEMENT = '1'; // 分时结算

    const SPLIT = '2'; // 分账

    #[JsonIgnore]
    protected string $uri = '/merchant/specialApplication/commitApply';

    protected string $applicationType;

    protected string $mno;

    protected string $callbackUrl = '';

    //-------------------------------------------------------------- 分时结算申请

    protected string $paymentSet = '';

    protected string $settTime = '';

    protected string $settleAccount = '';

    protected string $licensePictureUrl = '';

    protected string $assistPictureUrlStr = '';

    protected string $operaReason = '';

    //-------------------------------------------------------------- 订单分账申请

    protected string $accountRatio = '';

    /**
     * @var array<SplitAccount>
     */
    protected array $splitAccounts = [];

    /**
     * @var array<string>
     */
    protected array $agreementPicStr = [];

    /**
     * @var array<string>
     */
    protected array $scenesPicStr = [];

    /**
     * @var array<string>
     */
    protected array $otherPicStr = [];

    protected string $remark = '';

    /**
     * @param string $applicationType
     */
    public function setApplicationType(string $applicationType): void
    {
        $this->applicationType = $applicationType;
    }

    /**
     * @param string $mno
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl(string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @param string $paymentSet
     */
    public function setPaymentSet(string $paymentSet): void
    {
        $this->paymentSet = $paymentSet;
    }

    /**
     * @param string $settTime
     */
    public function setSettTime(string $settTime): void
    {
        $this->settTime = $settTime;
    }

    /**
     * @param string $settleAccount
     */
    public function setSettleAccount(string $settleAccount): void
    {
        $this->settleAccount = $settleAccount;
    }

    /**
     * @param string $licensePictureUrl
     */
    public function setLicensePictureUrl(string $licensePictureUrl): void
    {
        $this->licensePictureUrl = $licensePictureUrl;
    }

    /**
     * @param string $assistPictureUrlStr
     */
    public function setAssistPictureUrlStr(string $assistPictureUrlStr): void
    {
        $this->assistPictureUrlStr = $assistPictureUrlStr;
    }

    /**
     * @param string $operaReason
     */
    public function setOperaReason(string $operaReason): void
    {
        $this->operaReason = $operaReason;
    }

    /**
     * @param string $accountRatio
     */
    public function setAccountRatio(string $accountRatio): void
    {
        $this->accountRatio = $accountRatio;
    }

    /**
     * @param array $splitAccounts
     */
    public function setSplitAccounts(array $splitAccounts): void
    {
        $this->splitAccounts = $splitAccounts;
    }

    /**
     * @param array $agreementPicStr
     */
    public function setAgreementPicStr(array $agreementPicStr): void
    {
        $this->agreementPicStr = $agreementPicStr;
    }

    /**
     * @param array $scenesPicStr
     */
    public function setScenesPicStr(array $scenesPicStr): void
    {
        $this->scenesPicStr = $scenesPicStr;
    }

    /**
     * @param array $otherPicStr
     */
    public function setOtherPicStr(array $otherPicStr): void
    {
        $this->otherPicStr = $otherPicStr;
    }

    /**
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }


}

