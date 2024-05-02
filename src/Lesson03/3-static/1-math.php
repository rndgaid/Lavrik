<?php

class Math
{
    public const PI = 3.14;

    public static function rangeArea(float $r): float
    {
        return $r * $r * self::PI;
    }

    public static function rangeLength(float $r): float
    {
        return 2 * $r * self::PI;
    }
}

/*  $m = new Math();
    echo $m->rangeArea(5) . '<br>';
    echo $m->rangeLength(5) . '<br>'; */

echo Math::rangeArea(5) . '<br>';
echo Math::rangeLength(5) . '<br>';

/*
    parent
    self
    static
*/