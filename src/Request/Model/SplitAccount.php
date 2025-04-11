<?php

namespace Summer\TianQue\Request\Model;

use Summer\TianQue\Kernel\Contract\Arrayable;

/**
 * 分账接收方
 */
class SplitAccount implements Arrayable
{
    private string $mno;

    private string $splitCycle = '';

    private string $relationShip = '';

    private string $scenes = '';

    /**
     * @param string $mno
     */
    public function setMno(string $mno): void
    {
        $this->mno = $mno;
    }

    /**
     * @param string $splitCycle
     */
    public function setSplitCycle(string $splitCycle): void
    {
        $this->splitCycle = $splitCycle;
    }

    /**
     * @param string $relationShip
     */
    public function setRelationShip(string $relationShip): void
    {
        $this->relationShip = $relationShip;
    }

    /**
     * @param string $scenes
     */
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