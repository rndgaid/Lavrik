<?php

namespace Lesson01\hw01;

class SingleTag extends Tag
{
    public function render(): string
    {
        return self::OPEN_TAG . $this->tagName . $this->attributes . self::CLOSE_TAG;
    }
}
