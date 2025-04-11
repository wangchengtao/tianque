<?php

namespace Summer\TianQue\Kernel;

use Summer\TianQue\Kernel\Support\PublicKey;

class Config
{
    private string $domain;

    private string $orgId;

    private string $privateKey;

    private PublicKey $publicKey;

    private string $signType;

    public function __construct(string $domain, string $orgId, string $privateKey, string $publicKey, string $signType = 'RSA')
    {
        $this->domain = $domain;
        $this->orgId = $orgId;
        $this->privateKey = $privateKey;
        $this->publicKey = new PublicKey($publicKey);
        $this->signType = $signType;
    }


    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getOrgId(): string
    {
        return $this->orgId;
    }

    /**
     * @param string $orgId
     */
    public function setOrgId(string $orgId): void
    {
        $this->orgId = $orgId;
    }

    /**
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     */
    public function setPrivateKey(string $privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @return \Summer\TianQue\Kernel\Support\PublicKey
     */
    public function getPublicKey(): PublicKey
    {
        return $this->publicKey;
    }


    public function setPublicKey(string $publicKey): void
    {
        $this->publicKey = new PublicKey($publicKey);
    }

    /**
     * @return string
     */
    public function getSignType(): string
    {
        return $this->signType;
    }

    /**
     * @param string $signType
     */
    public function setSignType(string $signType): void
    {
        $this->signType = $signType;
    }




}