<?php

namespace Summer\TianQue\Request;


class QueryApplyInfoRequest extends Request
{
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