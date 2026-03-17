<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Response\Model\AccountInfo;
use Summer\TianQue\Response\QueryLedgerAccountResponse;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends TestCase
{
    public function testExample()
    {
        $req = new QueryLedgerAccountResponse([
            'bizCode' => '0000',
            'bizMsg' => 'ccc',
            'accountInfo' => [
                'mno' => '1234',
                'allotValue' => '23432',
                'ruleId' => '234324',
            ],
        ]);

        $this->assertInstanceOf(AccountInfo::class, $req->accountInfo);
    }
}
