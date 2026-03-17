<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant;

use Summer\TianQue\Request\Request;

/**
 * 分账协议签署.
 *
 * 合作方系统可以通过调用本接口签署分账协议（出款商户需要签署，收款商户无需签署）。
 * 收到接口返回协议签约连接后，需要确保点击'同意'完成签署（实时生效）。
 * 当签署过分账协议的个体户/企业类商户注册名称发生变更，或小微商户升级为普通商户时，需重新签署分账协议。
 * 选择线下签约时必须上送线下分账协议，提交后天阙侧进行审核，审核通过即视为商户完成签约（实时生效）。
 */
class GetSignUrlRequest extends Request
{
    public string $mno;

    /**
     * 签约类型, 枚举值
     *
     * 00：接口签约, 调用成功后，返回签约地址，商户需访问该地址进行签约
     * 01：短信签约, 调用成功后，将签约地址通过短信发送给商户，商户在短信内点开链接完成签约
     * 02：线下签约, 需先调用图片上传接口上传协议图片，然后在此接口上传图片信息，我司进行审核
     */
    public string $signType;

    /**
     * 分账协议图片地址, 逗号连接.
     *
     * 链接签约或短信签约无需上送，线下签约时，至少上传一张，最多可上传5张
     */
    public ?string $ledgerLetter;

    /**
     * 分账协议签署结果通知地址
     */
    public ?string $notifyUrl;

    protected string $uri = '/merchant/sign/getUrl';
}
