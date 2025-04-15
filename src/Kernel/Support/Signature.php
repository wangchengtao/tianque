<?php

namespace Summer\TianQue\Kernel\Support;


class Signature
{

    public static function strForSign(array $params): string
    {
        unset($params['sign']);
        ksort($params);

        $str = '';
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $str .= $key . '=' . json_encode($value, 320) . '&';
            } else {
                $str .= $key . '=' . $value . '&';
            }
        }

        return rtrim($str, '&');
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

    public static function verify(array $params, string $sign, string $signType, $publicKey): bool
    {
        $str = self::strForSign($params);

        if ($signType === 'RSA2') {
            return openssl_verify($str, base64_decode($sign), $publicKey, OPENSSL_ALGO_SHA256) === 1;
        }

        return openssl_verify($str, base64_decode($sign), $publicKey) === 1;
    }



}