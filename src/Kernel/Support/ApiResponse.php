<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Support;

use InvalidArgumentException;
use Summer\TianQue\Kernel\Exception\TianQueException;
use Summer\TianQue\Kernel\Traits\Constructor;

class ApiResponse
{
    use Constructor;

    public const SUCCESS = '0000';

    protected string $code;

    protected string $msg;

    protected string $orgId;

    protected string $reqId;

    protected array $respData;

    protected ?string $signType;

    protected ?string $sign;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getMsg(): string
    {
        return $this->msg;
    }

    public function getOrgId(): string
    {
        return $this->orgId;
    }

    public function getReqId(): string
    {
        return $this->reqId;
    }

    /**
     * @return array|string
     */
    public function getRespData(?string $key = null)
    {
        if ($key) {
            if (array_key_exists($key, $this->respData)) {
                return $this->respData[$key];
            }

            throw new TianQueException('Invalid key: ' . $key);
        }

        return $this->respData;
    }

    public function getSignType(): string
    {
        return $this->signType;
    }

    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @template T of \Summer\TianQue\Response\Response
     *
     * @param class-string<T> $class 目标类名
     * @return T
     */
    public function to(string $class)
    {
        if (! class_exists($class)) {
            throw new InvalidArgumentException(sprintf('Class %s not exists', $class));
        }

        return new $class($this->respData);
    }
}
