<?php

namespace Summer\TianQue\Response;

class UploadResponse extends Response
{
    protected string $cdnUrl;

    protected string $PhotoUrl;

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