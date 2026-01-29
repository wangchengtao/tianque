<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Support;

use Summer\TianQue\Kernel\Exception\TianQueException;

class PrivateKey extends Key
{
    public function format(string $content): string
    {
        if (str_starts_with($content, '-----BEGIN PRIVATE KEY-----')) {
            return $content;
        }

        return "-----BEGIN PRIVATE KEY-----\n" . chunk_split($content, 64) . '-----END PRIVATE KEY-----';
    }

    public function load(string $content): void
    {
        $key = openssl_pkey_get_private($content);

        if (! $key) {
            throw new TianQueException('私钥非法');
        }

        $this->key = $key;
    }
}
