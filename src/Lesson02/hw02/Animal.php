<?php

namespace Lesson02\hw02;

class Animal implements \JsonSerializable
{
    public string $name;
    public float $health;
    protected bool $alive;
    private float $power;

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
        return $this->power * (random_int(100, 300) / 200);
    }

    public function makeDamage(float $damage): void
    {
        $this->health -= $damage;

        if ($this->health < 0) {
            $this->health = 0;
            $this->alive = false;
        }
    }

    public function jsonSerialize(): mixed
    {
//        return
//            'name ' . $this->name .
//            ' health ' . $this->health .
//            ' power ' . $this->power .
//            ' alive ' . $this->alive;
        return [
            'name' => $this->name,
            'health' => $this->health,
            'power' => $this->power,
            'alive' => $this->alive];
    }
}
