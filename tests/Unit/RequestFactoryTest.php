<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Kernel\RequestFactory;
use Summer\TianQue\Response\Response;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class RequestFactoryTest extends TestCase
{
    use InitAopClient;

    public function testCreate(): void
    {
        $request = RequestFactory::create('POST', '/merchant/specialApplication/queryApplyInfo', [
            'id' => '123',
        ]);

        $this->assertEquals(['id' => '123'], $request->toArray());

        $res = $this->client->execute($request);

        $this->assertEquals(Response::SUCCESS, $res->getCode());
        $this->assertEquals(Response::FAIL, $res->getRespData('bizCode'), '申请单号错误');
    }
}
