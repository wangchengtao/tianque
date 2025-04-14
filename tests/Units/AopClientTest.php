<?php

namespace Summer\TianQue\Tests\Units;

use Summer\TianQue\Kernel\AopClient;
use Summer\TianQue\Kernel\Config;
use Summer\TianQue\Kernel\Support\ApiResponse;
use Summer\TianQue\Request\CommitApplyRequest;
use Summer\TianQue\Request\Model\SplitAccount;
use Summer\TianQue\Request\QueryApplyInfoRequest;
use Summer\TianQue\Request\UploadRequest;
use Summer\TianQue\Response\QueryApplyInfoResponse;
use Summer\TianQue\Response\Response;
use Summer\TianQue\Tests\TestCase;

class AopClientTest extends TestCase
{
    public Config $config;

    public AopClient $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->config = new Config(
            'https://openapi-test.tianquetech.com',
            '14653730',
            file_get_contents( TEST_ROOT .'/resources/private_key.pem'),
            '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOmsrFtFPTnEzfpJ/hDl5RODBxw4i9Ex3NmmG/N7A1+by032zZZgLLpdNh8y5otjFY0E37Nyr4FGKFRSSuDiTk8vfx3pv6ImS1Rxjjg4qdVHIfqhCeB0Z2ZPuBD3Gbj8hHFEtXZq8+msAFu/5ZQjiVhgs5WWBjh54LYWSum+d9+wIDAQAB
-----END PUBLIC KEY-----',
        );

        $this->client = new AopClient($this->config);
    }


    /**
     * @test
     */
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

    /**
     * @test
     */
    public function queryApplyInfo()
    {
        $request = new QueryApplyInfoRequest();
        $request->setId('123');

        $res = $this->client->execute($request);
        $response = new QueryApplyInfoResponse($res->getRespData());

        $this->assertNotEquals(Response::SUCCESS, $response->getBizCode(), '申请单号错误');
    }

    /**
     * @test
     */
    public function upload()
    {
        $request = new UploadRequest();
        $request->setOrgId($this->config->getOrgId());
        $request->setPictureType(86);
        $request->setFile('https://mat.hicootest.com/image/7eK0lCdfQPWHa3DZY0ohrM7v1U0aYzA9FaYGJ16f.png');

        $res = $this->client->upload($request);

        $this->assertEquals(Response::SUCCESS, $res->getBizCode());

    }



}