<?php

declare(strict_types=1);

namespace Summer\TianQue\Tests\Unit;

use Summer\TianQue\Request\UploadRequest;
use Summer\TianQue\Response\Response;
use Summer\TianQue\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class UploadTest extends TestCase
{
    use InitAopClient;

    public function testUpload(): void
    {
        $request = new UploadRequest();
        $request->setOrgId($this->config->getOrgId());
        $request->setPictureType(86);
        $request->setFile('https://mat.hicootest.com/image/7eK0lCdfQPWHa3DZY0ohrM7v1U0aYzA9FaYGJ16f.png');

        $res = $this->client->upload($request);

        $this->assertEquals(Response::SUCCESS, $res->getBizCode());
    }
}
