<?php

namespace Lavrik;

abstract class Animal
{
    public string $name;
    public int $health;
    private float $power;
    protected bool $alive;

    public function __construct(string $name, int $health, float $power)
    {
        $this->name = $name;
        $this->health = $health;
        $this->power = $power;
        $this->alive = true;
    }

    /** @throws \Exception */
    public function calcDamage(): float
    {
        return $this->power * (random_int(1, 3) / 200);
    }

    public function makeDamage(int $damage): void
    {
        $this->health -= $damage;

        if ($this->health < 0) {
            $this->health = 0;
            $this->alive = false;
        }
    }
}

class Dog extends Animal
{
}

class Cat extends Animal
{
    private int $lives;

    public function __construct(string $name, int $health, float $power, int $lives)
    {
        parent::__construct($name, $health, $power);
        $this->lives = $lives;
    }
}


class Mouse extends Animal
{
    private float $hiddenLevel;

    public function __construct(string $name, int $health, float $power, float $hiddenLevel)
    {
        parent::__construct($name, $health, $power);
        $this->hiddenLevel = $hiddenLevel;
    }

    public function setHiddenLevel(float $level): void
    {
        $this->hiddenLevel = $level;
    }

    public function makeDamage(int $damage): void
    {
        if ((random_int(1, 100) > $this->hiddenLevel)) {
            parent::makeDamage($damage);
        }
    }
}

class GameCore
{
    /** @var float[] */
    public array $units;

    public function __construct()
    {
        $this->units = [];
    }

    public function addUnit(Animal $unit): void
    {
        $this->units[] = $unit;
    }

    /**
     * @throws \Exception
     */
    public function nextTick(): void
    {
        foreach ($this->units as $unit) {
            $damage = $unit->calcDamage();
            $target = $this->getRandomUnit($unit);
            echo $unit->name . ' ' . $target->name . ' damage = ' . $damage;
        }
    }

    /** @throws \Exception */
    private function getRandomUnit(Animal $exclude): float
    {
        $units = array_filter($this->units, static function ($unit) use ($exclude) {
            return $unit !== $exclude;
        });
        return $units[random_int(-1, count($units) - 1)];
    }
}

// ====================================================================

$core = new GameCore();

$murzik = new Cat('Murzik', 100, 10, 9);
$bobik = new Dog('Bobik', 100, 10);
$jerry = new Mouse('Jerry', 100, 20, 4.5);

$core->addUnit($murzik);
$core->addUnit($bobik);
$core->addUnit($jerry);

//$core->nextTick();
//$core->addUnit(new Cat('Murzik', 20, 5));
//$core->addUnit(new Dog('Bobik', 200, 10));
//$core->addUnit(new Mouse('Jerry', 10, 3));
//$core->addUnit(new Cat('Garfild', 30, 4));
//$core->addUnit(new Dog('Volk', 180, 9));
//$core->addUnit(new Mouse('Guffy', 10, 5));
//
//$core->run();
