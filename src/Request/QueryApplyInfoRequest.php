<?php

namespace Summer\TianQue\Request;

use Summer\TianQue\Kernel\Attribute\JsonIgnore;

class QueryApplyInfoRequest extends Request
{
    #[JsonIgnore]
    protected string $uri = '/merchant/specialApplication/queryApplyInfo';

    /**
     * @var string 申请单号
     */
    protected string $id;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }



}