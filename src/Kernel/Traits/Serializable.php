<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Traits;

use ReflectionClass;
use ReflectionProperty;
use Summer\TianQue\Kernel\Contract\Arrayable;

trait Serializable
{
    public function toArray(): array
    {
        $result = [];
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $property->setAccessible(true);

            if (! $property->isInitialized($this)) {
                continue;
            }

            $propertyName = $property->getName();
            $propertyValue = $property->getValue($this);

            if (is_null($propertyValue)) {
                continue;
            }

            if (is_array($propertyValue)) {
                $result[$propertyName] = $this->map($propertyValue);
            } elseif ($propertyValue instanceof Arrayable) {
                $result[$propertyName] = $propertyValue->toArray();
            } else {
                $result[$propertyName] = $propertyValue;
            }
        }

        return $result;
    }

    protected function map(array $properties)
    {
        return array_map(function ($item) {
            if (is_array($item)) {
                return $this->map($item);
            }

            if ($item instanceof Arrayable) {
                return $item->toArray();
            }

            return $item;
        }, $properties);
    }
}
