<?php

namespace Summer\TianQue\Kernel\Support;

use OpenSSLAsymmetricKey;
use Summer\TianQue\Kernel\Exception\TianQueException;

class PublicKey
{
    public OpenSSLAsymmetricKey $key;

    public function __construct(string $content)
    {
        $key = openssl_pkey_get_public($content);

        if ($key === false) {
            throw new TianQueException('公钥非法');
        }

         $this->key = $key;
    }
    
    public function getKey(): OpenSSLAsymmetricKey
    {
        return $this->key;
    }
}