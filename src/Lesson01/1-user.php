<?php

declare(strict_types=1);

class UserStatutes
{
    public const CREATED = 0;
    public const ACTIVATED = 1;
    public const BANNED = 2;
}

class User
{
    public int $id;
    public string $login;
    public string $name;
    private int $status;
    public int $created;

    public function __construct(int $id, string $login, string $name, int $status, int $created)
    {
        $this->id = $id;
        $this->login = $login;
        $this->name = $name;
        $this->status = $status;
        $this->created = $created;
    }

    public function isActive(): bool
    {
        return $this->status === UserStatutes::ACTIVATED;
    }

    public function activate(): void
    {
        $this->status = UserStatutes::ACTIVATED;
    }

    public function ban(): void
    {
        $this->status = UserStatutes::BANNED;
    }
}

$user1 = new User(1, 'admin', 'Alex', 0, time());
$user2 = new User(2, 'manager', 'Joe', 0, 1713157289);
$user1->activate();
$user2->ban();
print_r($user1);
print_r($user2);
