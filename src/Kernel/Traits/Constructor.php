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
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->{$method}($value);
                    continue;
                }

                if ($reflectionClass->hasProperty($key)) {
                    $property = $reflectionClass->getProperty($key);

                    if ($property->isPublic()) {
                        $type = $property->getType();

                        if ($type->isBuiltin()) {
                            $property->setValue($this, $value);
                        } else {
                            // 复杂对象
                            $className = $type->getName();
                            if (class_exists($className)) {
                                $property->setValue($this, new $className($value));
                            }
                        }
                    }
                }
            }
        }
    }
}
