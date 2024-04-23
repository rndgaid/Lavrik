<?php

namespace Lesson02\hw02;

use JsonSerializable;

class JSONLogger
{
    /** @var JsonSerializable[] */
    protected array $objects = [];

    public function addObject(JsonSerializable $obj): void
    {
        $this->objects[] = $obj;
    }

    /** @return mixed[] */
    public function log(): array
    {
        return array_map(
            static fn(JsonSerializable $obj) => $obj->jsonSerialize(),
            $this->objects
        );
    }
}
