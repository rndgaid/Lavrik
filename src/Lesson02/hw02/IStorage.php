<?php

namespace Lesson02\hw02;

interface IStorage
{
    public function add(string $key, mixed $data): void;

    public function remove(string $key): void;

    public function contains(string $key): bool;

    public function get(string $key): mixed;
}
