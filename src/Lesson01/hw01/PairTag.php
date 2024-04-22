<?php

namespace Lesson01\hw01;

class PairTag extends Tag
{
    /** @var IRenderable[] */
    protected array $appendedTags = [];

    public function appendChild(IRenderable $tag): self
    {
        $this->appendedTags[] = $tag;

        return $this;
    }

    public function render(): string
    {
        return self::OPEN_TAG . $this->tagName . $this->attributes . self::CLOSE_TAG .
            $this->getChildTags() . self::END_TAG .
            $this->tagName . self::CLOSE_TAG;
    }

    protected function getChildTags(): string
    {
        if (count($this->appendedTags) === 0) {
            return '';
        }

        $arr = array_map(static fn($appendedTag) => $appendedTag->render(), $this->appendedTags);

        return implode('', $arr);
    }
}
