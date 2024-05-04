<?php

namespace Lesson03\hw03;

interface IStorage
{
    /** @param mixed[] $fields */
    public function create(array $fields): int;

    /** @return string[]|null */
    public function get(int $id): ?array;

    public function remove(int $id): bool;

    /** @param string[] $fields */
    public function update(int $id, array $fields): bool;
}
