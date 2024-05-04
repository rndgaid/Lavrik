<?php

namespace Lesson03\hw03;

use RuntimeException;

class FileStorage implements IStorage
{
    /** @var array<mixed> */
    protected array $records = [];
    protected int $ai = 0;
    protected string $dbPath;
    /** @var FileStorage[]  */
    private static array $instances = [];

    public static function getInstance(string $dbPath): self
    {
        return self::$instances[$dbPath] ?? self::$instances[$dbPath] = new FileStorage($dbPath);
    }

    protected function __construct(string $dbPath)
    {
        $this->dbPath = $dbPath;
        $this->validatePath();
        $this->jsonDecode($this->loadDbContent());
    }

    protected function validatePath(): void
    {
        if (!file_exists($this->dbPath)) {
            throw new RuntimeException('File ' . $this->dbPath . ' does not exist');
        }
    }

    protected function jsonDecode(string $content): void
    {
        $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        if (!isset($data['records'], $data['ai'])) {
            throw new RuntimeException('Invalid JSON structure');
        }

        $this->records = $data['records'];
        $this->ai = $data['ai'];
    }

    protected function loadDbContent(): string
    {
        $content = file_get_contents($this->dbPath);

        if ($content === false) {
            throw new RuntimeException('File ' . $this->dbPath . ' does not readable');
        }

        return $content;
    }

    public function create(array $fields): int
    {
        $id = ++$this->ai;
        $this->records[$id] = $fields;
        $this->save();
        return $id;
    }

    protected function save(): void
    {
        file_put_contents($this->dbPath, json_encode([
            'records' => $this->records,
            'ai' => $this->ai
        ], JSON_THROW_ON_ERROR));
    }

    public function get(int $id): ?array
    {
        return $this->records[$id] ?? null;
    }

    public function remove(int $id): bool
    {
        if (array_key_exists($id, $this->records)) {
            unset($this->records[$id]);
            $this->save();
            return true;
        }

        return false;
    }

    public function update(int $id, array $fields): bool
    {
        if (array_key_exists($id, $this->records)) {
            $this->records[$id] = $fields;
            $this->save();
            return true;
        }

        return false;
    }
}
