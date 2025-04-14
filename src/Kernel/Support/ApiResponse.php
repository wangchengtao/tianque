<?php

namespace Summer\TianQue\Kernel\Support;

use ReflectionClass;
use Summer\TianQue\Kernel\Trait\Constructor;

class ApiResponse
{
    use Constructor;

    const SUCCESS = '0000';


    protected string $code;

    protected string $msg;

    protected string $orgId;

    protected string $reqId;

    protected array $respData;

    protected ?string $signType;

    protected ?string $sign;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @return string
     */
    public function getOrgId(): string
    {
        return $this->orgId;
    }

    /**
     * @return string
     */
    public function getReqId(): string
    {
        return $this->reqId;
    }

    /**
     * @return array
     */
    public function getRespData(): array
    {
        return $this->respData;
    }

    /**
     * @return string
     */
    public function getSignType(): string
    {
        return $this->signType;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }


}