<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Request\ApplyDetailRequest;
use Summer\TianQue\Request\BalanceLedgerRequest;
use Summer\TianQue\Request\CancelLedgerRequest;
use Summer\TianQue\Request\GetTransferInfoRequest;
use Summer\TianQue\Request\MerChangeRequest;
use Summer\TianQue\Request\MerJoinRequest;
use Summer\TianQue\Response\ApplyDetailResponse;
use Summer\TianQue\Response\BalanceLedgerResponse;
use Summer\TianQue\Response\CancelLedgerResponse;
use Summer\TianQue\Response\GetTransferInfoResponse;
use Summer\TianQue\Response\MerChangeResponse;
use Summer\TianQue\Response\MerJoinResponse;
use Summer\TianQue\Response\Response;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class FundProjectTest extends TestCase
{
    use InitAopClient;

    public function testMerJoinRequest(): void
    {
        $request = new MerJoinRequest();
        $request->setApplyNo('TEST_JOIN_001');
        $request->setProjectNo('PROJECT001');
        $request->setMno('MNO123456');
        $request->setBalanceLedgerFlag('01');
        $request->setBusinessDescPicId(['pic1', 'pic2', 'pic3']);
        $request->setOtherProvePicId('pic4,pic5');
        $request->setRole('01');
        $request->setBalanceFeeRate('0.38');
        $request->setBalanceMinFee('1.00');
        $request->setBalanceMaxFee('99999.99');
        $request->setRemark('测试备注');
        $request->setCallbackUrl('https://example.com/callback');

        $this->assertEquals('TEST_JOIN_001', $request->applyNo);
        $this->assertEquals('PROJECT001', $request->projectNo);
        $this->assertEquals('MNO123456', $request->mno);
        $this->assertEquals('01', $request->balanceLedgerFlag);
        $this->assertEquals('pic1,pic2,pic3', $request->businessDescPicId);
        $this->assertEquals('pic4,pic5', $request->otherProvePicId);
        $this->assertEquals('01', $request->role);
        $this->assertEquals('0.38', $request->balanceFeeRate);
        $this->assertEquals('1.00', $request->balanceMinFee);
        $this->assertEquals('99999.99', $request->balanceMaxFee);
        $this->assertEquals('测试备注', $request->remark);
        $this->assertEquals('https://example.com/callback', $request->callbackUrl);
        $this->assertEquals('/capital/fundProject/merJoin', $request->getUri());
        $this->assertEquals('POST', $request->getMethod());
    }

    public function testMerChangeRequest(): void
    {
        $request = new MerChangeRequest();
        $request->setApplyNo('TEST_CHANGE_001');
        $request->setProjectNo('PROJECT001');
        $request->setMno('MNO123456');
        $request->setBalanceLedgerFlag('01');
        $request->setCancelFlag('01');
        $request->setRole('02');
        $request->setBusinessDescPicId(['pic1', 'pic2']);
        $request->setOtherProvePicId(['pic3']);
        $request->setBalanceFeeRate('0.40');
        $request->setBalanceMinFee('2.00');
        $request->setBalanceMaxFee('50000.00');
        $request->setRemark('变更测试备注');
        $request->setCallbackUrl('https://example.com/change-callback');

        $this->assertEquals('TEST_CHANGE_001', $request->applyNo);
        $this->assertEquals('PROJECT001', $request->projectNo);
        $this->assertEquals('MNO123456', $request->mno);
        $this->assertEquals('01', $request->balanceLedgerFlag);
        $this->assertEquals('01', $request->cancelFlag);
        $this->assertEquals('02', $request->role);
        $this->assertEquals('pic1,pic2', $request->businessDescPicId);
        $this->assertEquals('pic3', $request->otherProvePicId);
        $this->assertEquals('0.40', $request->balanceFeeRate);
        $this->assertEquals('2.00', $request->balanceMinFee);
        $this->assertEquals('50000.00', $request->balanceMaxFee);
        $this->assertEquals('变更测试备注', $request->remark);
        $this->assertEquals('https://example.com/change-callback', $request->callbackUrl);
        $this->assertEquals('/capital/fundProject/merChange', $request->getUri());
        $this->assertEquals('POST', $request->getMethod());
    }

    public function testApplyDetailRequest(): void
    {
        $request = new ApplyDetailRequest();
        $request->setApplyNo('TEST_APPLY_001');

        $this->assertEquals('TEST_APPLY_001', $request->applyNo);
        $this->assertEquals('/capital/fundProject/applyDetail', $request->getUri());
        $this->assertEquals('POST', $request->getMethod());
    }

    public function testMerJoinResponse(): void
    {
        $data = [
            'bizCode' => Response::SUCCESS,
            'bizMsg' => '操作成功',
            'applyNo' => 'TEST_JOIN_001',
            'applyStatus' => MerJoinResponse::APPLYING,
        ];

        $response = new MerJoinResponse($data);

        $this->assertEquals('TEST_JOIN_001', $response->getApplyNo());
        $this->assertEquals('00', $response->getApplyStatus());
        $this->assertEquals(MerJoinResponse::APPLYING, $response->getApplyStatus());
    }

    public function testMerChangeResponse(): void
    {
        $data = [
            'bizCode' => Response::SUCCESS,
            'bizMsg' => '操作成功',
            'applyNo' => 'TEST_CHANGE_001',
            'applyStatus' => MerChangeResponse::PASSED,
        ];

        $response = new MerChangeResponse($data);

        $this->assertEquals('TEST_CHANGE_001', $response->getApplyNo());
        $this->assertEquals('01', $response->getApplyStatus());
        $this->assertEquals(MerChangeResponse::PASSED, $response->getApplyStatus());
    }

    public function testApplyDetailResponse(): void
    {
        $data = [
            'bizCode' => Response::SUCCESS,
            'bizMsg' => '操作成功',
            'applyNo' => 'TEST_APPLY_001',
            'applyStatus' => ApplyDetailResponse::PASSED,
            'auditTime' => '2023-01-12 17:06:06',
            'auditSuggest' => '审核意见呗通过了',
        ];

        $response = new ApplyDetailResponse($data);

        $this->assertEquals('TEST_APPLY_001', $response->getApplyNo());
        $this->assertEquals('01', $response->getApplyStatus());
        $this->assertEquals(MerChangeResponse::PASSED, $response->getApplyStatus());
        $this->assertEquals('2023-01-12 17:06:06', $response->getAuditTime());
        $this->assertEquals('审核意见呗通过了', $response->getAuditSuggest());
    }

    public function testBalanceLedgerRequest(): void
    {
        $request = new BalanceLedgerRequest();
        $request->setMno('MNO123456');
        $request->setTargetMno('TARGET_MNO_001');
        $request->setInvestor('01');
        $request->setAccountRule('00');
        $request->setOrderNo('ORDER_20230101_001');
        $request->setAmount('100.50');
        $request->setContent('商品余额转账test');
        $request->setProjectNo('PROJECT001');

        $this->assertEquals('MNO123456', $request->mno);
        $this->assertEquals('TARGET_MNO_001', $request->targetMno);
        $this->assertEquals('01', $request->investor);
        $this->assertEquals('00', $request->accountRule);
        $this->assertEquals('ORDER_20230101_001', $request->orderNo);
        $this->assertEquals('100.50', $request->amount);
        $this->assertEquals('商品余额转账test', $request->content);
        $this->assertEquals('PROJECT001', $request->projectNo);
        $this->assertEquals('/capital/balanceLedger/ledger', $request->getUri());
        $this->assertEquals('POST', $request->getMethod());
    }

    public function testBalanceLedgerResponse(): void
    {
        $data = [
            'bizCode' => Response::SUCCESS,
            'bizMsg' => '成功',
            'content' => '商品余额转账test',
            'transactionNo' => 'TQ926230333f004afdafb876ce1e0bcdb5',
            'transactionTime' => '2023-02-09 16:03:44',
            'clrDt' => '20230209',
            'orderNo' => 'e0bce2cca8dd4aefa1bc5a5033371479',
            'tranStatus' => BalanceLedgerResponse::SUCCESS,
        ];

        $response = new BalanceLedgerResponse($data);

        $this->assertEquals('商品余额转账test', $response->getContent());
        $this->assertEquals('TQ926230333f004afdafb876ce1e0bcdb5', $response->getTransactionNo());
        $this->assertEquals('2023-02-09 16:03:44', $response->getTransactionTime());
        $this->assertEquals('20230209', $response->getClrDt());
        $this->assertEquals('e0bce2cca8dd4aefa1bc5a5033371479', $response->getOrderNo());
        $this->assertEquals('00', $response->getTranStatus());
        $this->assertEquals(BalanceLedgerResponse::SUCCESS, $response->getTranStatus());
    }

    public function testBalanceLedgerResponseStatusConstants(): void
    {
        $this->assertEquals('00', BalanceLedgerResponse::SUCCESS);
        $this->assertEquals('01', BalanceLedgerResponse::FAILED);
        $this->assertEquals('02', BalanceLedgerResponse::PENDING);
    }

    public function testCancelLedgerRequest(): void
    {
        $request = new CancelLedgerRequest();
        $request->setMno('399200709538033');
        $request->setOrderNo('7395b5b27fc54188b3f6037bd29e7182');
        $request->setContent('商品撤销转账test');
        $request->setOrigOrderNo('e0bce2cca8dd4aefa1bc5a5033371479');
        $request->setOrigTransactionId('TQ926230333f004afdafb876ce1e0bcdb5');

        $this->assertEquals('399200709538033', $request->mno);
        $this->assertEquals('7395b5b27fc54188b3f6037bd29e7182', $request->orderNo);
        $this->assertEquals('商品撤销转账test', $request->content);
        $this->assertEquals('e0bce2cca8dd4aefa1bc5a5033371479', $request->origOrderNo);
        $this->assertEquals('TQ926230333f004afdafb876ce1e0bcdb5', $request->origTransactionId);
        $this->assertEquals('/capital/balanceLedger/cancelLedger', $request->getUri());
        $this->assertEquals('POST', $request->getMethod());
    }

    public function testCancelLedgerResponse(): void
    {
        $data = [
            'bizCode' => Response::SUCCESS,
            'bizMsg' => '成功',
            'content' => '商品撤销转账test',
            'transactionNo' => 'TQa9b590f6901d41e4aa4c7f6f440ddb1c',
            'origOrderNO' => 'e0bce2cca8dd4aefa1bc5a5033371479',
            'origTransactionId' => 'TQ926230333f004afdafb876ce1e0bcdb5',
            'transactionTime' => '2023-02-09 16:04:17',
            'clrDt' => '20230209',
            'orderNo' => '7395b5b27fc54188b3f6037bd29e7182',
            'tranStatus' => CancelLedgerResponse::SUCCESS,
            'amount' => '0.01',
        ];

        $response = new CancelLedgerResponse($data);

        $this->assertEquals('商品撤销转账test', $response->getContent());
        $this->assertEquals('TQa9b590f6901d41e4aa4c7f6f440ddb1c', $response->getTransactionNo());
        $this->assertEquals('e0bce2cca8dd4aefa1bc5a5033371479', $response->getOrigOrderNO());
        $this->assertEquals('TQ926230333f004afdafb876ce1e0bcdb5', $response->getOrigTransactionId());
        $this->assertEquals('2023-02-09 16:04:17', $response->getTransactionTime());
        $this->assertEquals('20230209', $response->getClrDt());
        $this->assertEquals('7395b5b27fc54188b3f6037bd29e7182', $response->getOrderNo());
        $this->assertEquals('00', $response->getTranStatus());
        $this->assertEquals(CancelLedgerResponse::SUCCESS, $response->getTranStatus());
        $this->assertEquals('0.01', $response->getAmount());
    }

    public function testCancelLedgerResponseStatusConstants(): void
    {
        $this->assertEquals('00', CancelLedgerResponse::SUCCESS);
        $this->assertEquals('01', CancelLedgerResponse::FAILED);
        $this->assertEquals('02', CancelLedgerResponse::PENDING);
    }

    public function testGetTransferInfoRequest(): void
    {
        // 测试使用 orderNo 查询
        $request1 = new GetTransferInfoRequest();
        $request1->setMno('399190618057330');
        $request1->setOrderNo('66052093052359051145115900102411');
        $request1->setTranNo(null);

        $this->assertEquals('399190618057330', $request1->mno);
        $this->assertEquals('66052093052359051145115900102411', $request1->orderNo);
        $this->assertNull($request1->tranNo);
        $this->assertEquals('/capital/fundManage/getTransferInfo', $request1->getUri());
        $this->assertEquals('POST', $request1->getMethod());

        // 测试使用 tranNo 查询
        $request2 = new GetTransferInfoRequest();
        $request2->setMno('399190618057330');
        $request2->setOrderNo(null);
        $request2->setTranNo('TQ926230333f004afdafb876ce1e0bcdb5');

        $this->assertEquals('399190618057330', $request2->mno);
        $this->assertNull($request2->orderNo);
        $this->assertEquals('TQ926230333f004afdafb876ce1e0bcdb5', $request2->tranNo);
    }

    public function testGetTransferInfoResponse(): void
    {
        $data = [
            'bizCode' => Response::SUCCESS,
            'bizMsg' => '成功',
            'tranNo' => 'TQ926230333f004afdafb876ce1e0bcdb5',
            'mno' => '399190618057330',
            'rate' => '0.01',
            'amount' => '100.50',
            'content' => '商品余额分账',
            'investor' => '01',
            'tranStatus' => GetTransferInfoResponse::SUCCESS,
            'transferTime' => '2023-02-09 16:03:44',
            'clrDt' => '20230209',
        ];

        $response = new GetTransferInfoResponse($data);

        $this->assertEquals('TQ926230333f004afdafb876ce1e0bcdb5', $response->getTranNo());
        $this->assertEquals('399190618057330', $response->getMno());
        $this->assertEquals('0.01', $response->getRate());
        $this->assertEquals('100.50', $response->getAmount());
        $this->assertEquals('商品余额分账', $response->getContent());
        $this->assertEquals('01', $response->getInvestor());
        $this->assertEquals('00', $response->getTranStatus());
        $this->assertEquals(GetTransferInfoResponse::SUCCESS, $response->getTranStatus());
        $this->assertEquals('2023-02-09 16:03:44', $response->getTransferTime());
        $this->assertEquals('20230209', $response->getClrDt());
    }

    public function testGetTransferInfoResponseStatusConstants(): void
    {
        $this->assertEquals('00', GetTransferInfoResponse::SUCCESS);
        $this->assertEquals('01', GetTransferInfoResponse::FAILED);
        $this->assertEquals('02', GetTransferInfoResponse::PENDING);
    }
}
