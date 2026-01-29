<?php

declare(strict_types=1);

namespace Summer\TianQue\Request\Merchant\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;

/**
 * 分账接收方.
 */
class SplitAccount implements Arrayable
{
    private string $mno;

    private string $splitCycle = '';

    private string $relationShip = '';

    private string $scenes = '';

    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    public function setSplitCycle(string $splitCycle): void
    {
        $this->splitCycle = $splitCycle;
    }

    public function setRelationShip(string $relationShip): void
    {
        $this->relationShip = $relationShip;
    }

    public function setScenes(string $scenes): void
    {
        $this->scenes = $scenes;
    }

    public function toArray(): array
    {
        return array_filter([
            'mno' => $this->mno,
            'splitCycle' => $this->splitCycle,
            'relationShip' => $this->relationShip,
            'scenes' => $this->scenes,
        ]);
    }
}
