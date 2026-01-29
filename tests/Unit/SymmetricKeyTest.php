<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Kernel\Exception\TianQueException;
use Summer\TianQue\Kernel\Support\PrivateKey;
use Summer\TianQue\Kernel\Support\PublicKey;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class SymmetricKeyTest extends TestCase
{
    public function testValidPublicKey()
    {
        $key = new PublicKey('MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOmsrFtFPTnEzfpJ/hDl5RODBxw4i9Ex3NmmG/N7A1+by032zZZgLLpdNh8y5otjFY0E37Nyr4FGKFRSSuDiTk8vfx3pv6ImS1Rxjjg4qdVHIfqhCeB0Z2ZPuBD3Gbj8hHFEtXZq8+msAFu/5ZQjiVhgs5WWBjh54LYWSum+d9+wIDAQAB');

        $this->assertTrue(true);
    }

    public function testValidFormatPublicKey()
    {
        $key = new PublicKey('-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOmsrFtFPTnEzfpJ/hDl5RODBxw4i9Ex3NmmG/N7A1+by032zZZgLLpdNh8y5otjFY0E37Nyr4FGKFRSSuDiTk8vfx3pv6ImS1Rxjjg4qdVHIfqhCeB0Z2ZPuBD3Gbj8hHFEtXZq8+msAFu/5ZQjiVhgs5WWBjh54LYWSum+d9+wIDAQAB
-----END PUBLIC KEY-----');

        $this->assertTrue(true);
    }

    public function testInvalidPublicKey()
    {
        $this->expectException(TianQueException::class);
        $this->expectExceptionMessage('公钥非法');

        $key = new PublicKey(
            'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOmsrFtFPTnEzfpJ/
            hDl5RODBxw4i9Ex3NmmG/N7A1+by032zZZgLLpdNh8y5otjFY0E37Nyr4FGKFRSSuDiTk8vfx3pv
            6ImS1Rxjjg4qdVHIfqhCeB0Z2ZPuBD3Gbj8hHFEtXZq8+msAFu/5ZQjiVhgs5WWBjh54LYWSum+d9+wIDAQAB',
        );
    }

    public function testValidPrivateKey()
    {
        $key = new PrivateKey(file_get_contents(TEST_ROOT . '/resources/private_key.pem'));

        $this->assertTrue(true);
    }

    public function testInvalidatePrivateKey()
    {
        $this->expectException(TianQueException::class);
        $this->expectExceptionMessage('私钥非法');

        $key = new PrivateKey('sjflsdflksdhfldshflk');
    }
}
