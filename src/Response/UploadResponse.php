<?php

declare(strict_types=1);

namespace Summer\TianQue\Response;

class UploadResponse extends Response
{
    protected string $cdnUrl;

    protected string $PhotoUrl;

    public function getCdnUrl(): string
    {
        return $this->cdnUrl;
    }

    public function getPhotoUrl(): string
    {
        return $this->PhotoUrl;
    }
}
