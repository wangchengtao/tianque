<?php

namespace Summer\TianQue\Kernel\Support;

use Summer\TianQue\Kernel\Exception\TianQueException;

class PrivateKey
{
    private $key;

    public function __construct(string $str)
    {
        $key = openssl_pkey_get_private($str);

        if ($key === false) {
            throw new TianQueException('私钥非法');
        }

        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key;
    }
}