<?php

namespace Summer\TianQue\Request;

use ReflectionClass;
use Summer\TianQue\Kernel\Contract\Arrayable;

abstract class Request implements Arrayable
{
    protected string $method = 'POST';

    protected string $uri;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }


    public function toArray(): array
    {
        $result = [];
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $propertyValue = $property->getValue($this);

            if (empty($propertyValue)) {
                continue;
            }

            $result[$propertyName] = is_array($propertyValue) ? $this->map($propertyValue) : $propertyValue;
        }

        return $result;
    }

    protected function map(array $properties)
    {
        return array_map(function ($item) {
            if ($item instanceof Arrayable) {
                return $item->toArray();
            }

            return $item;
        }, $properties);
    }

}