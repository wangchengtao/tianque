<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel;

use Summer\TianQue\Kernel\Support\PrivateKey;
use Summer\TianQue\Kernel\Support\PublicKey;

class Config
{
    private string $domain;

    private string $orgId;

    private PrivateKey $privateKey;

    private PublicKey $publicKey;

    private string $signType;

    private string $version;

    public function __construct(string $domain, string $orgId, string $privateKey, string $publicKey, string $signType = 'RSA', string $version = '1.0')
    {
        $this->domain = $domain;
        $this->orgId = $orgId;
        $this->privateKey = new PrivateKey($privateKey);
        $this->publicKey = new PublicKey($publicKey);
        $this->signType = $signType;
        $this->version = $version;
    }

    public static function fromArray(array $config): Config
    {
        return new self(
            $config['domain'],
            $config['org_id'],
            $config['private_key'],
            $config['public_key'],
            $config['sign_type'] ?? 'RSA'
        );
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    public function getOrgId(): string
    {
        return $this->orgId;
    }

    public function setOrgId(string $orgId): void
    {
        $this->orgId = $orgId;
    }

    public function getPrivateKey(): PrivateKey
    {
        return $this->privateKey;
    }

    public function setPrivateKey(string $privateKey): void
    {
        $this->privateKey = new PrivateKey($privateKey);
    }

    public function getPublicKey(): PublicKey
    {
        return $this->publicKey;
    }

    public function setPublicKey(string $publicKey): void
    {
        $this->publicKey = new PublicKey($publicKey);
    }

    public function getSignType(): string
    {
        return $this->signType;
    }

    public function setSignType(string $signType): void
    {
        $this->signType = $signType;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }
}
