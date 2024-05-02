<?php

class Some
{
    public static int $b = 2;
    public int $a = 1;

    public function test()
    {
        return $this->a * self::$b;
    }
}

$s1 = new Some();
$s2 = new Some();
$s2->a = 10;

var_dump($s1);
echo '<br>';
var_dump($s2);

echo '<br>';
echo Some::$b;

echo '<br>';
echo $s1->test();
echo '<br>';
echo $s2->test();

Some::$b = 100;

echo '<br>';
echo $s1->test();
echo '<br>';
echo $s2->test();
