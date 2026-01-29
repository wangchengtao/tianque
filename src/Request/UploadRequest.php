<?php

declare(strict_types=1);

namespace Summer\TianQue\Request;

class UploadRequest extends Request
{
    protected string $uri = '/merchant/uploadPicture';

    protected string $orgId;

    protected string $reqId;

    protected string $pictureType;

    /**
     * @var resource file
     */
    protected $file;

    public function getOrgId(): string
    {
        return $this->orgId;
    }

    public function setOrgId(string $orgId): void
    {
        $this->orgId = $orgId;
    }

    public function getReqId(): string
    {
        return $this->reqId;
    }

    public function setReqId(string $reqId): void
    {
        $this->reqId = $reqId;
    }

    public function getPictureType(): string
    {
        return $this->pictureType;
    }

    public function setPictureType(int $pictureType): void
    {
        $this->pictureType = (string) $pictureType;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(string $file): void
    {
        $this->file = fopen($file, 'r');
    }

    public function toMultipart(): array
    {
        $arr = $this->toArray();

        return array_map(function ($key, $value) {
            return [
                'name' => $key,
                'contents' => $value,
            ];
        }, array_keys($arr), array_values($arr));
    }
}
