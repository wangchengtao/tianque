<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel\Traits;

use ReflectionClass;

trait Constructor
{
    public function __construct(array $params = [])
    {
        if ($params) {
            $reflectionClass = new ReflectionClass($this);

            foreach ($params as $key => $value) {
                if ($reflectionClass->hasProperty($key)) {
                    $property = $reflectionClass->getProperty($key);
                    $property->setAccessible(true);
                    $property->setValue($this, $value);
                }

                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->{$method}($value);
                }
            }
        }
    }
}
