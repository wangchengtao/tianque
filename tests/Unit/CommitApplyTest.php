<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Request\Merchant\CommitApplyRequest;
use Summer\TianQue\Request\Merchant\Model\SplitAccount;
use Summer\TianQue\Request\Merchant\QueryApplyInfoRequest;
use Summer\TianQue\Response\QueryApplyInfoResponse;
use Summer\TianQue\Response\Response;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class CommitApplyTest extends TestCase
{
    use InitAopClient;

    public function testCommitApply(): void
    {
        $request = new CommitApplyRequest();

        $request->setApplicationType(CommitApplyRequest::SPLIT);
        $request->setMno('8018001181');
        $request->setAccountRatio('80');

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

        $this->assertEquals(Response::SUCCESS, $res->getCode());
        $this->assertEquals(Response::FAIL, $res->getRespData('bizCode'), '商户编号不存在');
    }

    public function testQueryApplyInfo(): void
    {
        $request = new QueryApplyInfoRequest();
        $request->setId('123');

        $res = $this->client->execute($request);

        $this->assertEquals(Response::SUCCESS, $res->getCode());
        $this->assertEquals(Response::FAIL, $res->to(QueryApplyInfoResponse::class)->getBizCode(), '申请单号错误');
    }
}
