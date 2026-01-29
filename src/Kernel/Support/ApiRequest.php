<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Support;

use Summer\TianQue\Kernel\Contract\Arrayable;

class ApiRequest
{
    protected string $orgId;

    protected string $reqId;

    protected Arrayable $reqData;

    protected string $timestamp;

    protected string $signType = 'RSA';

    protected string $version = '1.0';

    protected string $sign;

    public function setOrgId(string $orgId): void
    {
        $this->orgId = $orgId;
    }

    public function setReqId(string $reqId): void
    {
        $this->reqId = $reqId;
    }

    public function setReqData(Arrayable $reqData): void
    {
        $this->reqData = $reqData;
    }

    public function setTimestamp(): void
    {
        $this->timestamp = date('YmdHis');
    }

    public function getSignType(): string
    {
        return $this->signType;
    }

    public function setSignType(string $signType): void
    {
        $this->signType = $signType;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }

    public function toArray(bool $withSign = false): array
    {
        $default = [
            'orgId' => $this->orgId,
            'reqId' => $this->reqId,
            'reqData' => $this->reqData->toArray(),
            'timestamp' => $this->timestamp,
            'signType' => $this->signType,
            'version' => $this->version,
        ];

        if ($withSign) {
            $default['sign'] = $this->sign;
        }

        return $default;
    }
}
