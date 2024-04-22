<?php

namespace Lesson01\hw01;

interface IValidatable
{
    public function isValid(string $name): bool;
}
