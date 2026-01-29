<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Merchant\Model\BankCardRate;
use Summer\TianQue\Request\Merchant\Model\Qrcode;
use Summer\TianQue\Request\Request;

class IncomeRequest extends Request
{
    // --------------------------------------基础信息--------------------------------------

    /**
     *  签购单名称.
     *
     * 1、显示在消费者账单中的商户名称，非必传，不传时则与商户简称一致；
     * 2、建议填入实际经营的内容，如XX快餐店/XX炸鸡；
     * 3、不能为纯数字。
     */
    public ?string $merName;

    /**
     * 商户简称.
     *
     * 1、商户在天阙平台的名称，建议填入用于识别商户的简要名称，未上传签购单名称时，此字段同时作为签购单名称显示在消费者账单中；
     * 2、不能为纯数字；
     * 3、连锁模式，如要求分店使用统一的签购单名称时，可用商户简称作为区分。
     */
    public string $mecDisNm;

    /**
     * 商户联系手机号.
     *
     * 1、个人资质商户请传入在运营商实名认证过的商户负责人手机号
     * 2、企业资质商户传入企业联系人电话
     * 3、纯数字
     */
    public string $mblNo;

    /**
     * 经营类型, 枚举值
     *
     * 01 线下
     * 02 线上
     * 03 非盈利类
     * 04 缴费类
     * 05 保险类
     * 06 私立院校
     */
    public string $operationalType;

    /**
     * 资质类型.
     *
     * 取值范围：
     * 01 自然人
     * 02 个体户
     * 03 企业
     * 04 政府机关
     * 05 事业单位
     * 06 其他组织
     * mecTypeFlag=01（连锁总店）或03（1+N总店）时，此处不能选自然人；
     * mecTypeFlag=04（1+n分店）时仅能选自然人；
     * 线上商户需选择03企业/04政府机关/05事业单位/06其他组织；
     */
    public string $haveLicenseNo;

    /**
     * 商户类型，枚举值
     *
     * 取值范围：
     * 00 普通单店商户
     * 01 连锁总店
     * 02 连锁分店
     * mecTypeFlag == 02（连锁分店）时需校验所属总店mecTypeFlag必须为01 连锁总店
     */
    public string $mecTypeFlag;

    /**
     * 所属总店商户编号，当mecTypeFlag==04 时必传.
     */
    public ?string $parentMno;

    /**
     * 连锁分店是否独立结算，枚举值
     * 取值范围：
     * 00 独立结算
     * 01 非独立结算
     * 商户类型(mecTypeFlag==02)连锁分店时必传此参数；其他情况传入无效.
     */
    public ?string $independentModel;

    /**
     * 线上产品类型，枚举值
     * 取值范围：
     * 01 APP
     * 02 网站
     * 03 公众号/小程序/服务窗
     * 经营类型为线上(operationalType=='02')时，本字段必填.
     */
    public ?string $onlineType;

    /**
     * APP名称/网站网址/公众号/小程序/服务窗名称
     * 经营类型为线上(operationalType=='02')时，本字段必填.
     */
    public ?string $onlineName;

    /**
     * APP/网站/公众号/小程序/服务窗下载地址及账号信息.
     */
    public ?string $onlineTypeInfo;

    /**
     * 注册地址省编码
     *
     * 需要与营业执照照面一致；
     * 省、市、区编码、街道地址（四个参数需同时上传）
     */
    public ?string $provCd;

    /**
     * 注册地址市编码
     *
     * 需要与营业执照照面一致；
     * 省、市、区编码、街道地址（四个参数需同时上传）
     */
    public ?string $cityCd;

    /**
     * 注册地址区编码
     *
     * 需要与营业执照照面一致；
     * 省、市、区编码、街道地址（四个参数需同时上传）
     */
    public ?string $distCd;

    /**
     * 注册地址街道地址
     *
     * 直接填写详细街道门牌号即可；
     * 省、市、区编码、街道地址（四个参数需同时上传）
     */
    public ?string $detailAddress;

    /**
     * 商户实际经营详细地址
     * 直接填写详细街道门牌号即可；.
     */
    public string $cprRegAddr;

    /**
     * 实际经营地址省编码
     */
    public string $regProvCd;

    /**
     * 实际经营地址市编码
     */
    public string $regCityCd;

    /**
     * 营业执照注册地址区编码
     */
    public string $regDistCd;

    /**
     * 经营类目 MCC
     * 请选择正确MCC入网。
     * 参加AT活动（蓝海/微信智慧餐饮/微信高校食堂）的商户，为确保报名成功，请按照上游要求(详见活动报名接口)的MCC进件。
     */
    public string $mccCd;

    /**
     * 客服电话
     * 纯数字.
     */
    public string $csTelNo;

    /**
     * 邮箱
     * 此字段将上送至微信、支付宝.
     */
    public ?string $email;

    // --------------------------------------功能类信息--------------------------------------

    /**
     * @var Qrcode[] 二维码费率
     */
    public array $qrcodeList;

    /**
     * @var null|BankCardRate[] 刷卡费率
     *
     * 未传入则取机构预设的默认进件费率
     */
    public ?array $bankCardRates;

    /**
     * 行业规则ID，枚举值
     *
     * 00 标准类
     * 01 服饰鞋包、美妆日化、健身运动服务类
     *
     * 仅资质类型为企业/个体户且MCC为《涉及MCC》内的MCC支持传入，不传系统默认 00 标准类
     */
    public ?string $businessRule;

    /**
     * 结算类型，枚举值
     *
     * 取值范围：
     * 03 T1结算
     * 04 D1结算
     * 不传值时，系统会根据合作机构签约时的默认结算产品执行。
     */
    public ?string $settleType;

    /**
     * 银行卡预授权开关，枚举值
     *
     * 取值范围：
     * 01 关闭
     * 02 开通
     */
    public ?string $bankCardPreAuthorization;

    /**
     * 二维码预授权开关，枚举值
     *
     * 取值范围：
     * 01 关闭
     * 02 开通
     */
    public ?string $qrCodePreAuthorization;

    /**
     * 指定微信渠道号.
     *
     * 多渠道号情况下使用，进件到指定微信渠道号下
     */
    public ?string $specifyWechatChannel;

    /**
     * 指定支付宝PID.
     *
     * 多渠道号情况下使用，进件到指定支付宝PID下
     */
    public ?string $specifyALiPayChannel;

    /**
     * 回调地址
     *
     * 天阙平台支持推送商户入驻审核的终态结果给该地址，推送格式参见接口【入驻审核结果通知】
     * 如果不传，则依赖入驻结果查询接口获取审核最终状态
     */
    public ?string $callbackUrl;

    /**
     * 复核回调地址
     *
     * 天阙平台支持推送商户入驻审核的终态结果给该地址，推送格式参见接口【入驻审核结果通知】
     * 如果不传，则依赖入驻结果查询接口获取审核最终状态
     */
    public ?string $checkCallbackUrl;

    // --------------------------------------资质证照信息--------------------------------------

    /**
     * 营业执照注册名称.
     *
     * 需确保和营业执照照片一致，如果个体户营业执照中没有注册名称或注册名称是*，此处需要按照'个体户+法人姓名'的格式传入。
     */
    public ?string $cprRegNmCn;

    /**
     * 营业执照注册号.
     *
     * 营业执照号/统一信用编码。
     * 资质类型为个体户、企业、政府机关、事业单位、其他组织(haveLicenseNo==02/03/04/05/06)时，本字段必填
     */
    public ?string $registCode;

    /**
     * 是否三证合一，枚举值
     *
     * 取值范围：
     * 00 是
     * 01 否
     * 资质类型为企业、政府机关、事业单位、其他组织(haveLicenseNo==03/04/05/06)时，本字段必填
     */
    public ?string $licenseMatch;

    /**
     * 组织机构代码
     */
    public ?string $orgCode;

    /**
     * 税务登记号.
     */
    public ?string $taxRegNo;

    /**
     * 营业执照起始日.
     *
     * 格式为: YYYYMMDD
     * 营业执照起始日、营业执照到期日需同时上传
     */
    public ?string $businessLicStt;

    /**
     * 营业执照到期日.
     *
     * 格式为: YYYYMMDD
     * 营业执照起始日、营业执照到期日需同时上传
     * 长期有效请传29991231
     */
    public ?string $businessLicEnt;

    /**
     * 法人/商户负责人姓名.
     */
    public string $identityName;

    /**
     * 法人/商户负责人证件类型，枚举值
     *
     * 取值范围：
     * 00 身份证
     * 05 港澳居民往来内地通行证
     * 06 台湾居民来往大陆通行证
     * 07 护照
     * 99 其他
     */
    public string $identityTyp;

    /**
     * 法人/商户负责人证件号.
     */
    public string $identityNo;

    /**
     * 法人/商户负责人证件起始日
     * 格式为: YYYYMMDD.
     */
    public ?string $legalPersonLicStt;

    /**
     * 法人/商户负责人证件到期日.
     *
     * 格式为: YYYYMMDD
     * 长期有效请传29991231
     */
    public ?string $legalPersonLicEnt;

    // --------------------------------------结算账户信息--------------------------------------

    /**
     * 结算账户名
     * 自然人商户、线上类商户不允许授权结算。对公结算账户名与注册名没有包含关系时，需上传授权函。
     */
    public string $actNm;

    /**
     * 结算账户类型，枚举值
     *
     * 取值范围：
     * 00 对公
     * 01 对私
     * 说明：自然人商户只允许对私结算；线上商户只允许对公结算
     */
    public string $actTyp;

    /**
     * 结算人证件类型，枚举值
     *
     * 取值范围：
     * 00 身份证
     * 05 港澳居民往来内地通行证
     * 06 台湾居民来往大陆通行证
     * 07 护照
     * 99 其他
     */
    public ?string $actNoType;

    /**
     * 结算人证件号
     * 对私结算必传.
     */
    public ?string $stmManIdNo;

    /**
     * 结算人证件起始日
     * 格式为: YYYYMMDD.
     */
    public ?string $accountLicStt;

    /**
     * 结算人证件到期日
     * 格式为: YYYYMMDD
     * 长期有效请传29991231.
     */
    public ?string $accountLicEnt;

    /**
     * 结算卡号.
     */
    public string $actNo;

    /**
     * 开户银行
     * 如联行行号不传，【开户银行、开户省份、开户城市】即为必传.
     */
    public ?string $depoBank;

    /**
     * 开户省份
     * 如联行行号不传，【开户银行、开户省份、开户城市】即为必传.
     */
    public ?string $depoProvCd;

    /**
     * 开户城市
     * 如联行行号不传，【开户银行、开户省份、开户城市】即为必传.
     */
    public ?string $depoCityCd;

    /**
     * 开户支行联行号.
     *
     * 对公必传，对私非18大行必传；发卡行是村镇银行、城市商业银行、农村商业银行、其他银行则必传
     */
    public ?string $lbnkNo;

    /**
     * 开户支行名称.
     */
    public ?string $lbnkNm;

    // --------------------------------------图片信息--------------------------------------

    /**
     * 营业执照照片地址
     * 个体、企业、政府机关、事业单位、其他组织必传.
     */
    public ?string $licensePic;

    /**
     * 税务登记证照片地址
     * 企业、政府机关、事业单位、其他组织非三证合一必传.
     */
    public ?string $taxRegistLicensePic;

    /**
     * 组织机构代码证照片地址
     * 企业、政府机关、事业单位、其他组织非三证合一必传.
     */
    public ?string $orgCodePic;

    /**
     * 法人/商户负责人身份证正面(人像面)照片地址
     */
    public string $legalPersonidPositivePic;

    /**
     * 法人/商户负责人身份证反面(国徽面)照片地址
     */
    public string $legalPersonidOppositePic;

    /**
     * 开户许可证照片地址
     * 对公结算必传.
     */
    public ?string $openingAccountLicensePic;

    /**
     * 银行卡正面照片地址
     * 对私结算必传.
     */
    public ?string $bankCardPositivePic;

    /**
     * 银行卡反面照片地址
     */
    public ?string $bankCardOppositePic;

    /**
     * 结算人身份证正面(人像面)照片地址
     * 对私授权结算必传.
     */
    public ?string $settlePersonIdcardPositive;

    /**
     * 结算人身份证反面(国徽面)照片地址
     * 对私授权结算必传.
     */
    public ?string $settlePersonIdcardOpposite;

    /**
     * 商户协议照片地址
     */
    public ?string $merchantAgreementPic;

    /**
     * 门头照片地址
     */
    public string $storePic;

    /**
     * 真实商户内景照片地址
     */
    public string $insideScenePic;

    /**
     * 经营场所(含收银台)照片地址
     */
    public ?string $businessPlacePic;

    /**
     * ICP许可证或公众号主体信息截图照片地址
     * 线上网站类、公众号类商户必传
     * 经营类型为线上(operationalType=='02')时，本字段必填.
     */
    public ?string $icpLicence;

    /**
     * 手持身份证(人像面)照片地址
     */
    public ?string $handIdcardPic;

    /**
     * 租赁协议一(封面)照片地址
     */
    public ?string $leaseAgreementOnePic;

    /**
     * 租赁协议二(面积、有效期页)照片地址
     */
    public ?string $leaseAgreementTwoPic;

    /**
     * 租赁协议三(签章页)照片地址
     */
    public ?string $leaseAgreementThreePic;

    /**
     * 其他资料照片1地址
     * 机构跟银行的合作协议关键页或机构银行合作授权函(支付宝非盈利时需上传).
     */
    public ?string $otherMaterialPictureOne;

    /**
     * 其他资料照片2地址
     * 内景照片(支付宝非盈利时需要上传).
     */
    public ?string $otherMaterialPictureTwo;

    /**
     * 其他资料照片3地址
     * 财务室照片(支付宝非盈利时需上传).
     */
    public ?string $otherMaterialPictureThree;

    /**
     * 其他资料照片4地址
     */
    public ?string $otherMaterialPictureFour;

    /**
     * 其他资料照片5地址
     */
    public ?string $otherMaterialPictureFive;

    /**
     * 代理人签名照片地址
     */
    public ?string $agentPersonSignature;

    /**
     * 确认人签名照片地址
     */
    public ?string $confirmPersonSignature;

    /**
     * 授权函照片地址
     *
     * 非法人对私结算，即结算账户类型为对私结算，且结算人身份证号与法人身份证号不一致时该字段必传非法人结算授权函；
     * 结算账户类型为对公结算，结算账户名与营业执照注册名称不一致时该字段必传对公结算说明函
     */
    public ?string $letterOfAuthPic;

    /**
     * 统一结算无营业执照说明照片地址
     * 个人资质的连锁分店，如果统一结算，需上传总店对该店情况说明、证明连锁关系.
     */
    public ?string $unionSettleWithoutLicense;

    /**
     * 社会团体法人证书照片地址
     */
    public ?string $societyGroupLegPerPic;

    /**
     * 基金法人登记证书照片地址
     */
    public ?string $foundationLegPerRegPic;

    /**
     * 办学许可证照片地址
     */
    public ?string $schoolLicese;

    /**
     * 医疗机构执业许可证照片地址
     */
    public ?string $medicalInstitutionLicense;

    /**
     * 经营保险业务许可证照片地址
     */
    public ?string $insuranceLicese;

    /**
     * 保险业务法人等级证书照片地址
     */
    public ?string $insuranceLegPerGradePic;

    /**
     * 民办教育许可证照片地址
     */
    public ?string $privateEducationLicense;

    /**
     * 收费证明文件照片地址
     */
    public ?string $chargeProofPic;

    /**
     * 民办非企业单位登记证书
     * 部分MCC必传，参照特殊费率资质要求0820.xlsx.
     */
    public ?string $privateNonEnterprisePic;

    /**
     * 收费样本文件
     * 部分MCC必传，参照特殊费率资质要求0820.xlsx.
     */
    public ?string $feeSimplesPic;

    /**
     * 卫生局批文
     * 部分MCC必传，参照特殊费率资质要求0820.xlsx.
     */
    public ?string $healthBureauApprovalPic;

    protected string $uri = '/merchant/income';

    public function setMerName(?string $merName): void
    {
        $this->merName = $merName;
    }

    public function setMecDisNm(string $mecDisNm): void
    {
        $this->mecDisNm = $mecDisNm;
    }

    public function setMblNo(string $mblNo): void
    {
        $this->mblNo = $mblNo;
    }

    public function setOperationalType(string $operationalType): void
    {
        $this->operationalType = $operationalType;
    }

    public function setHaveLicenseNo(string $haveLicenseNo): void
    {
        $this->haveLicenseNo = $haveLicenseNo;
    }

    public function setMecTypeFlag(string $mecTypeFlag): void
    {
        $this->mecTypeFlag = $mecTypeFlag;
    }

    public function setParentMno(?string $parentMno): void
    {
        $this->parentMno = $parentMno;
    }

    public function setIndependentModel(?string $independentModel): void
    {
        $this->independentModel = $independentModel;
    }

    public function setOnlineType(?string $onlineType): void
    {
        $this->onlineType = $onlineType;
    }

    public function setOnlineName(?string $onlineName): void
    {
        $this->onlineName = $onlineName;
    }

    public function setOnlineTypeInfo(?string $onlineTypeInfo): void
    {
        $this->onlineTypeInfo = $onlineTypeInfo;
    }

    public function setProvCd(?string $provCd): void
    {
        $this->provCd = $provCd;
    }

    public function setCityCd(?string $cityCd): void
    {
        $this->cityCd = $cityCd;
    }

    public function setDistCd(?string $distCd): void
    {
        $this->distCd = $distCd;
    }

    public function setDetailAddress(?string $detailAddress): void
    {
        $this->detailAddress = $detailAddress;
    }

    public function setCprRegAddr(string $cprRegAddr): void
    {
        $this->cprRegAddr = $cprRegAddr;
    }

    public function setRegProvCd(string $regProvCd): void
    {
        $this->regProvCd = $regProvCd;
    }

    public function setRegCityCd(string $regCityCd): void
    {
        $this->regCityCd = $regCityCd;
    }

    public function setRegDistCd(string $regDistCd): void
    {
        $this->regDistCd = $regDistCd;
    }

    public function setMccCd(string $mccCd): void
    {
        $this->mccCd = $mccCd;
    }

    public function setCsTelNo(string $csTelNo): void
    {
        $this->csTelNo = $csTelNo;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setQrcodeList(array $qrcodeList): void
    {
        $this->qrcodeList = $qrcodeList;
    }

    public function setBankCardRates(?array $bankCardRates): void
    {
        $this->bankCardRates = $bankCardRates;
    }

    public function setBusinessRule(?string $businessRule): void
    {
        $this->businessRule = $businessRule;
    }

    public function setSettleType(?string $settleType): void
    {
        $this->settleType = $settleType;
    }

    public function setBankCardPreAuthorization(?string $bankCardPreAuthorization): void
    {
        $this->bankCardPreAuthorization = $bankCardPreAuthorization;
    }

    public function setQrCodePreAuthorization(?string $qrCodePreAuthorization): void
    {
        $this->qrCodePreAuthorization = $qrCodePreAuthorization;
    }

    public function setSpecifyWechatChannel(?string $specifyWechatChannel): void
    {
        $this->specifyWechatChannel = $specifyWechatChannel;
    }

    public function setSpecifyALiPayChannel(?string $specifyALiPayChannel): void
    {
        $this->specifyALiPayChannel = $specifyALiPayChannel;
    }

    public function setCallbackUrl(?string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function setCheckCallbackUrl(?string $checkCallbackUrl): void
    {
        $this->checkCallbackUrl = $checkCallbackUrl;
    }

    public function setCprRegNmCn(?string $cprRegNmCn): void
    {
        $this->cprRegNmCn = $cprRegNmCn;
    }

    public function setRegistCode(?string $registCode): void
    {
        $this->registCode = $registCode;
    }

    public function setLicenseMatch(?string $licenseMatch): void
    {
        $this->licenseMatch = $licenseMatch;
    }

    public function setOrgCode(?string $orgCode): void
    {
        $this->orgCode = $orgCode;
    }

    public function setTaxRegNo(?string $taxRegNo): void
    {
        $this->taxRegNo = $taxRegNo;
    }

    public function setBusinessLicStt(?string $businessLicStt): void
    {
        $this->businessLicStt = $businessLicStt;
    }

    public function setBusinessLicEnt(?string $businessLicEnt): void
    {
        $this->businessLicEnt = $businessLicEnt;
    }

    public function setIdentityName(string $identityName): void
    {
        $this->identityName = $identityName;
    }

    public function setIdentityTyp(string $identityTyp): void
    {
        $this->identityTyp = $identityTyp;
    }

    public function setIdentityNo(string $identityNo): void
    {
        $this->identityNo = $identityNo;
    }

    public function setLegalPersonLicStt(?string $legalPersonLicStt): void
    {
        $this->legalPersonLicStt = $legalPersonLicStt;
    }

    public function setLegalPersonLicEnt(?string $legalPersonLicEnt): void
    {
        $this->legalPersonLicEnt = $legalPersonLicEnt;
    }

    public function setActNm(string $actNm): void
    {
        $this->actNm = $actNm;
    }

    public function setActTyp(string $actTyp): void
    {
        $this->actTyp = $actTyp;
    }

    public function setActNoType(?string $actNoType): void
    {
        $this->actNoType = $actNoType;
    }

    public function setStmManIdNo(?string $stmManIdNo): void
    {
        $this->stmManIdNo = $stmManIdNo;
    }

    public function setAccountLicStt(?string $accountLicStt): void
    {
        $this->accountLicStt = $accountLicStt;
    }

    public function setAccountLicEnt(?string $accountLicEnt): void
    {
        $this->accountLicEnt = $accountLicEnt;
    }

    public function setActNo(string $actNo): void
    {
        $this->actNo = $actNo;
    }

    public function setDepoBank(?string $depoBank): void
    {
        $this->depoBank = $depoBank;
    }

    public function setDepoProvCd(?string $depoProvCd): void
    {
        $this->depoProvCd = $depoProvCd;
    }

    public function setDepoCityCd(?string $depoCityCd): void
    {
        $this->depoCityCd = $depoCityCd;
    }

    public function setLbnkNo(?string $lbnkNo): void
    {
        $this->lbnkNo = $lbnkNo;
    }

    public function setLbnkNm(?string $lbnkNm): void
    {
        $this->lbnkNm = $lbnkNm;
    }

    public function setLicensePic(?string $licensePic): void
    {
        $this->licensePic = $licensePic;
    }

    public function setTaxRegistLicensePic(?string $taxRegistLicensePic): void
    {
        $this->taxRegistLicensePic = $taxRegistLicensePic;
    }

    public function setOrgCodePic(?string $orgCodePic): void
    {
        $this->orgCodePic = $orgCodePic;
    }

    public function setLegalPersonidPositivePic(string $legalPersonidPositivePic): void
    {
        $this->legalPersonidPositivePic = $legalPersonidPositivePic;
    }

    public function setLegalPersonidOppositePic(string $legalPersonidOppositePic): void
    {
        $this->legalPersonidOppositePic = $legalPersonidOppositePic;
    }

    public function setOpeningAccountLicensePic(?string $openingAccountLicensePic): void
    {
        $this->openingAccountLicensePic = $openingAccountLicensePic;
    }

    public function setBankCardPositivePic(?string $bankCardPositivePic): void
    {
        $this->bankCardPositivePic = $bankCardPositivePic;
    }

    public function setBankCardOppositePic(?string $bankCardOppositePic): void
    {
        $this->bankCardOppositePic = $bankCardOppositePic;
    }

    public function setSettlePersonIdcardPositive(?string $settlePersonIdcardPositive): void
    {
        $this->settlePersonIdcardPositive = $settlePersonIdcardPositive;
    }

    public function setSettlePersonIdcardOpposite(?string $settlePersonIdcardOpposite): void
    {
        $this->settlePersonIdcardOpposite = $settlePersonIdcardOpposite;
    }

    public function setMerchantAgreementPic(?string $merchantAgreementPic): void
    {
        $this->merchantAgreementPic = $merchantAgreementPic;
    }

    public function setStorePic(string $storePic): void
    {
        $this->storePic = $storePic;
    }

    public function setInsideScenePic(string $insideScenePic): void
    {
        $this->insideScenePic = $insideScenePic;
    }

    public function setBusinessPlacePic(?string $businessPlacePic): void
    {
        $this->businessPlacePic = $businessPlacePic;
    }

    public function setIcpLicence(?string $icpLicence): void
    {
        $this->icpLicence = $icpLicence;
    }

    public function setHandIdcardPic(?string $handIdcardPic): void
    {
        $this->handIdcardPic = $handIdcardPic;
    }

    public function setLeaseAgreementOnePic(?string $leaseAgreementOnePic): void
    {
        $this->leaseAgreementOnePic = $leaseAgreementOnePic;
    }

    public function setLeaseAgreementTwoPic(?string $leaseAgreementTwoPic): void
    {
        $this->leaseAgreementTwoPic = $leaseAgreementTwoPic;
    }

    public function setLeaseAgreementThreePic(?string $leaseAgreementThreePic): void
    {
        $this->leaseAgreementThreePic = $leaseAgreementThreePic;
    }

    public function setOtherMaterialPictureOne(?string $otherMaterialPictureOne): void
    {
        $this->otherMaterialPictureOne = $otherMaterialPictureOne;
    }

    public function setOtherMaterialPictureTwo(?string $otherMaterialPictureTwo): void
    {
        $this->otherMaterialPictureTwo = $otherMaterialPictureTwo;
    }

    public function setOtherMaterialPictureThree(?string $otherMaterialPictureThree): void
    {
        $this->otherMaterialPictureThree = $otherMaterialPictureThree;
    }

    public function setOtherMaterialPictureFour(?string $otherMaterialPictureFour): void
    {
        $this->otherMaterialPictureFour = $otherMaterialPictureFour;
    }

    public function setOtherMaterialPictureFive(?string $otherMaterialPictureFive): void
    {
        $this->otherMaterialPictureFive = $otherMaterialPictureFive;
    }

    public function setAgentPersonSignature(?string $agentPersonSignature): void
    {
        $this->agentPersonSignature = $agentPersonSignature;
    }

    public function setConfirmPersonSignature(?string $confirmPersonSignature): void
    {
        $this->confirmPersonSignature = $confirmPersonSignature;
    }

    public function setLetterOfAuthPic(?string $letterOfAuthPic): void
    {
        $this->letterOfAuthPic = $letterOfAuthPic;
    }

    public function setUnionSettleWithoutLicense(?string $unionSettleWithoutLicense): void
    {
        $this->unionSettleWithoutLicense = $unionSettleWithoutLicense;
    }

    public function setSocietyGroupLegPerPic(?string $societyGroupLegPerPic): void
    {
        $this->societyGroupLegPerPic = $societyGroupLegPerPic;
    }

    public function setFoundationLegPerRegPic(?string $foundationLegPerRegPic): void
    {
        $this->foundationLegPerRegPic = $foundationLegPerRegPic;
    }

    public function setSchoolLicese(?string $schoolLicese): void
    {
        $this->schoolLicese = $schoolLicese;
    }

    public function setMedicalInstitutionLicense(?string $medicalInstitutionLicense): void
    {
        $this->medicalInstitutionLicense = $medicalInstitutionLicense;
    }

    public function setInsuranceLicese(?string $insuranceLicese): void
    {
        $this->insuranceLicese = $insuranceLicese;
    }

    public function setInsuranceLegPerGradePic(?string $insuranceLegPerGradePic): void
    {
        $this->insuranceLegPerGradePic = $insuranceLegPerGradePic;
    }

    public function setPrivateEducationLicense(?string $privateEducationLicense): void
    {
        $this->privateEducationLicense = $privateEducationLicense;
    }

    public function setChargeProofPic(?string $chargeProofPic): void
    {
        $this->chargeProofPic = $chargeProofPic;
    }

    public function setPrivateNonEnterprisePic(?string $privateNonEnterprisePic): void
    {
        $this->privateNonEnterprisePic = $privateNonEnterprisePic;
    }

    public function setFeeSimplesPic(?string $feeSimplesPic): void
    {
        $this->feeSimplesPic = $feeSimplesPic;
    }

    public function setHealthBureauApprovalPic(?string $healthBureauApprovalPic): void
    {
        $this->healthBureauApprovalPic = $healthBureauApprovalPic;
    }
}
