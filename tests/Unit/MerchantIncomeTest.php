<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Request\Merchant\IncomeRequest;
use Summer\TianQue\Request\Merchant\Model\Qrcode;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class MerchantIncomeTest extends TestCase
{
    use InitAopClient;

    public function testIncome()
    {
        $request = new IncomeRequest();
        $request->setMerName('商户名称');

        $list = [];

        for ($i = 0; $i < 1; ++$i) {
            $qrcode = new Qrcode();
            $qrcode->setRateType('01');
            $qrcode->setRate('8.75');

            $list[] = $qrcode;
        }

        $request->setQrcodeList($list);

        // 因为参数太多, 这里就只验证一下参数格式是否正确

        $arr = $request->toArray();

        $this->assertCount(2, $arr);
        $this->assertArrayHasKey('merName', $arr);
        $this->assertArrayHasKey('qrcodeList', $arr);
        $this->assertCount(1, $arr['qrcodeList']);

        $this->assertTrue(true);
    }
}
