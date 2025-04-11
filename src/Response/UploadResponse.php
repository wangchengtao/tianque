<?php

namespace Summer\TianQue\Response;

class UploadResponse extends Response
{
    protected string $bizCode;

    protected string $bizMsg;

    protected string $cdnUrl;

    protected string $PhotoUrl;

    /**
     * @return string
     */
    public function getBizCode(): string
    {
        return $this->bizCode;
    }

    /**
     * @return string
     */
    public function getBizMsg(): string
    {
        return $this->bizMsg;
    }

    /**
     * @return string
     */
    public function getCdnUrl(): string
    {
        return $this->cdnUrl;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->PhotoUrl;
    }


}