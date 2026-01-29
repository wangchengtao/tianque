<?php

declare(strict_types=1);

namespace Summer\TianQue\Kernel;

use Summer\TianQue\Request\Request;

class RequestFactory
{
    public static function create(string $method, string $uri, array $params = []): Request
    {
        $params += [
            'method' => $method,
            'uri' => $uri,
        ];

        return new class($params) extends Request {
            private array $data = [];

            public function __construct(array $params = [])
            {
                parent::__construct($params);

                foreach ($params as $key => $value) {
                    $this->{$key} = $value;
                }
            }

            public function toArray(): array
            {
                return parent::toArray() + $this->map($this->data);
            }

            public function __set(string $name, $value): void
            {
                $this->data[$name] = $value;
            }

            public function __get(string $name)
            {
                return $this->data[$name] ?? null;
            }

            public function __isset(string $name): bool
            {
                return isset($this->data[$name]);
            }

            public function __unset(string $name): void
            {
                unset($this->data[$name]);
            }
        };
    }
}
