<?php

namespace Summer\TianQue\Kernel\Support;

use Summer\TianQue\Kernel\Exception\TianQueException;

class PublicKey
{
    private $key;

    public function __construct(string $content)
    {
        $key = openssl_pkey_get_public($this->wrap($content));

        if ($key === false) {
            throw new TianQueException('公钥非法');
        }

         $this->key = $key;
    }
    
    public function getKey()
    {
        return $this->key;
    }

    private function wrap(string $data): string
    {
        return "-----BEGIN PUBLIC KEY-----\n" . chunk_split($data, 64, "\n") . '-----END PUBLIC KEY-----';
    }
}