<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Kernel\RequestFactory;
use Summer\TianQue\Request\Merchant\QueryApplyInfoRequest;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class RequestFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $request1 = RequestFactory::create('POST', '/merchant/specialApplication/queryApplyInfo', [
            'id' => '123',
        ]);

        $request2 = new QueryApplyInfoRequest();
        $request2->setId('123');

        $request3 = new QueryApplyInfoRequest(['id' => '123']);

        $this->assertEquals($request1->toArray(), $request2->toArray());
        $this->assertEquals($request2->toArray(), $request3->toArray());
    }
}
