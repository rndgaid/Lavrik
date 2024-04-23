<?php

namespace Lesson02\hw02;

class Storage implements IStorage, \JsonSerializable
{
    /** @var array<mixed> */
    protected array $dataStorage = [];


    public function add(string $key, mixed $data): void
    {
        $this->dataStorage[$key] = $data;
    }

    public function remove(string $key): void
    {
        if (false === $this->contains($key)) {
            throw new \RuntimeException('Key ' . $key . ' not found in data storage.');
        }
        unset($this->dataStorage[$key]);
    }

    public function contains(string $key): bool
    {
        return array_key_exists($key, $this->dataStorage);
    }

    public function get(string $key): mixed
    {
        return $this->contains($key) ?
            $this->dataStorage[$key] :
            throw new \RuntimeException('Key ' . $key . ' not found in data storage.');
    }

    public function jsonSerialize(): mixed
    {
        return $this->dataStorage;
    }
}
