<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Support;

abstract class Key
{
    protected $key;

    public function __construct($content)
    {
        $this->load($this->format($content));
    }

    public function getKey()
    {
        return $this->key;
    }

    abstract public function load(string $content): void;

    abstract public function format(string $content): string;
}
