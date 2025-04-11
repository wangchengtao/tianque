<?php

namespace Summer\TianQue\Tests;

use PHPUnit\Framework\Attributes\Test;
use Summer\TianQue\Kernel\AopClient;
use Summer\TianQue\Kernel\Config;
use Summer\TianQue\Kernel\Support\ApiResponse;
use Summer\TianQue\Request\CommitApplyRequest;
use Summer\TianQue\Request\Model\SplitAccount;
use Summer\TianQue\Request\UploadRequest;

class AopClientRequestTest extends TestCase
{
    public Config $config;

    public AopClient $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->config = new Config(
            'https://openapi-test.tianquetech.com',
            '14653730',
            '-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAObo+KhAY6nBfikP
XeLKHRgOfzjrmtckXCbSBuILTnIlVGIop5J0zkzfcCLzwk+xEij6c/t5vqFmpPNu
1562HspzrpnMHF8ieTwKPR7JSKKqlOs78ApewkSN80ob0v0y7Ni8bMnhGP63Q9AB
o5f1wd64t8IUuE2KG0gXJDQA9HAzAgMBAAECgYBkj18C/w+oNSD5RrzvcG/dMysK
oeiL+0S6j0r6FEx0f3dRTD02FfJmHgSa5CdiR04OVIxAH1P6vFXnwgTbFJsxYgx9
65G8q7tM6qVs2qt2XggGshcOdjunG2x4T44eJMwxJrDlTT/CIumihsVRd8ImdTV7
GhMZKoCDO/CxikvxiQJBAPRXy9ZyrM5eJK0DRx1n8fW25KIVOtJFjq0cAm08HVbU
wZm93UE9UXNs7TLZUSsrK6UM2Uv+rdHi/ZLwym7gi98CQQDx7R3XhzvBfWH9xyKl
pBnA5FV104XDPHxEIz7bEMX7vFUSQCsYmMKv7vu0IAOr6EH5/QOJB88wqC39Okdc
X2YtAkAn1GPy2hCXNzttRHqELZyAfEa6sRE8k4AVcdpnagQyUk4YvJ1jdBZh5WCp
CEm16ryblAOb4rD85K6HFF87QbkrAkEArpzcOyGqaZ9byNWgFjn5NJYZcK+5Dg9s
Can+xhK3M1jddgzGjjxD2MP+/CVXQQ6kABE0KgVu78mTWABmXS+mCQJBALoKAAhB
QG3xFVv5lJqgf+jzWWWdcdw1fzqnp+yhafrlhWd6serV3LGftcbTNtivIS4DNAAK
bUNl3XlBBUFiODI=
-----END PRIVATE KEY-----',
            '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOmsrFtFPTnEzfpJ/hDl5RODBxw4i9Ex3NmmG/N7A1+by032zZZgLLpdNh8y5otjFY0E37Nyr4FGKFRSSuDiTk8vfx3pv6ImS1Rxjjg4qdVHIfqhCeB0Z2ZPuBD3Gbj8hHFEtXZq8+msAFu/5ZQjiVhgs5WWBjh54LYWSum+d9+wIDAQAB
-----END PUBLIC KEY-----',
        );

        $this->client = new AopClient($this->config);
    }


    #[Test]
    public function commitApply()
    {
        $request = new CommitApplyRequest();

        $request->setApplicationType(CommitApplyRequest::SPLIT);
        $request->setMno('8018001181');
        $request->setAccountRatio(80);

        $splitAccount1 = new SplitAccount();
        $splitAccount1->setMno('1111');
        $splitAccount1->setSplitCycle('ssdfd');
        $splitAccount1->setScenes('s23432');

        $splitAccount2 = new SplitAccount();
        $splitAccount2->setMno('222');
        $splitAccount2->setSplitCycle('bbb');
        $splitAccount2->setScenes('bbb');

        $accounts[] = $splitAccount1;
        $accounts[] = $splitAccount2;

        $request->setSplitAccounts($accounts);

        $res = $this->client->execute($request);

        $this->assertInstanceOf(ApiResponse::class, $res);
    }

    #[Test]
    public function upload()
    {
        $request = new UploadRequest();
        $request->setOrgId($this->config->getOrgId());
        $request->setPictureType(86);
        $request->setFile('https://mat.hicootest.com/image/7eK0lCdfQPWHa3DZY0ohrM7v1U0aYzA9FaYGJ16f.png');

        $res = $this->client->upload($request);

        $this->assertEquals('0000', $res->getBizCode());

    }



}