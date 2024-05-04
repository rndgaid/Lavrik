<?php

namespace Lesson03\hw03;

class Article
{
    public string $title = '';
    public string $content = '';
    protected int $id;
    protected IStorage $storage;

    public function __construct(IStorage $storage)
    {
        $this->storage = $storage;
    }

    public function create(): int
    {
        return $this->id = $this->storage->create($this->packFields());
    }

    public function load(int $id): void
    {
        $data = $this->storage->get($id);

        if ($data === null) {
            throw new \RuntimeException('Article with id= ' . $id . ' not found');
        }

        [$this->id, $this->title, $this->content] = [$id, $data['title'], $data['content']];
    }

    public function save(): void
    {
        if (!$this->isValid()) {
            throw new \RuntimeException('[ Content ] field or [ title ] field is empty');
        }

        $this->storage->update($this->id, $this->packFields());
    }

    /** @return mixed[] */
    protected function packFields(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }

    protected function isValid(): bool
    {
        $title = trim($this->title);
        $content = trim($this->content);

        return !empty($title) || !empty($content);
    }
}
