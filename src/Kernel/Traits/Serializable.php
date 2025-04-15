<?php

namespace Summer\TianQue\Kernel\Traits;

use ReflectionClass;
use Summer\TianQue\Kernel\Contract\Arrayable;

trait Serializable
{
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