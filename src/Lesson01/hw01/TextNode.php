<?php

namespace Lesson01\hw01;

class TextNode implements IRenderable, IValidatable
{
    protected string $text;

    public function __construct(string $text)
    {
        $this->text = trim($text);
    }

    public function render(): string
    {
        return $this->text;
    }

    public function isValid(string $name): bool
    {
        return $this->text !== '';
    }
}
