<?php

namespace Summer\TianQue\Kernel\Support;


use OpenSSLAsymmetricKey;

class Signature
{

    public static function strForSign(array $params): string
    {
        unset($params['sign']);
        ksort($params);

        return http_build_query($params);
    }

    public static function sign(array $params, $signType, string $privateKey): string
    {
        $str = self::strForSign($params);

        if ($signType === 'RSA2') {
            openssl_sign($str, $sign, $privateKey, OPENSSL_ALGO_SHA256);
        } else {
            openssl_sign($str, $sign, $privateKey);
        }

        return base64_encode($sign);
    }

    public static function verify(array $params, string $sign, string $signType, OpenSSLAsymmetricKey $publicKey): bool
    {
        $str = self::strForSign($params);

        if ($signType === 'RSA2') {
            return openssl_verify($str, base64_decode($sign), $publicKey, OPENSSL_ALGO_SHA256) === 1;
        }

        return openssl_verify($str, base64_decode($sign), $publicKey) === 1;
    }



}