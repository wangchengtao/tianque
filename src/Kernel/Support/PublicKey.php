<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Support;

use Summer\TianQue\Kernel\Exception\TianQueException;

class PublicKey extends Key
{
    public function format(string $content): string
    {
        if (str_starts_with($content, '-----BEGIN PUBLIC KEY-----')) {
            return $content;
        }

        return "-----BEGIN PUBLIC KEY-----\n" . chunk_split($content, 64) . '-----END PUBLIC KEY-----';
    }

    public function load(string $content): void
    {
        $key = openssl_pkey_get_public($content);

        if ($key === false) {
            throw new TianQueException('公钥非法');
        }

        $this->key = $key;
    }
}
