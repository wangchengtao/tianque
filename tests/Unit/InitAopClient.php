<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Kernel\AopClient;
use Summer\TianQue\Kernel\Config;

trait InitAopClient
{
    public Config $config;

    public AopClient $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->config = new Config(
            'https://openapi-test.tianquetech.com',
            '14653730',
            file_get_contents(TEST_ROOT . '/resources/private_key.pem'),
            'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOmsrFtFPTnEzfpJ/hDl5RODBxw4i9Ex3NmmG/N7A1+by032zZZgLLpdNh8y5otjFY0E37Nyr4FGKFRSSuDiTk8vfx3pv6ImS1Rxjjg4qdVHIfqhCeB0Z2ZPuBD3Gbj8hHFEtXZq8+msAFu/5ZQjiVhgs5WWBjh54LYWSum+d9+wIDAQAB',
        );

        $this->client = new AopClient($this->config);
    }
}
