<?php

namespace Lesson01\hw01;

use http\Exception\InvalidArgumentException;
use http\Exception\RuntimeException;

abstract class Tag implements IRenderable, IValidatable
{
    protected const OPEN_TAG = '<';
    protected const CLOSE_TAG = '>';
    protected const END_TAG = '</';

    protected string $attributes = '';
    protected string $tagName = '';

    public function __construct(string $tagName)
    {
        $this->tagName = $tagName;
    }

    public function attr(string $name, string $value): self
    {
        $this->attributes .= ' ' . $name . '=' . '"' . $value . '"';
        return $this;
    }

    public function isValid(string $name): bool
    {
        $pattern = '/^[a-zA-Z]+$/';

        if (false === preg_match($pattern, $name)) {
            throw new RuntimeException('Error in regexp: ' . $pattern);
        }

        return (bool)preg_match($pattern, $name);
    }
}
