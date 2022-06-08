<?php

declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class UserDTO implements JsonSerializable
{
    private $users;
    private $type;

    public function __construct($users, $type)
    {
        $this->users = $users;
        $this->type = $type;
    }

    public function mountUser($users)
    {
        foreach ($users as $user) {
            $user->name = ucfirst($user->name);
            $user->addresses = $user->addresses();
        }

        return $users;
    }

    public function oneUser($users)
    {
        return [
            'id' => $users['id'],
            'name' => ucfirst($users['name']),
            'email' => $users['email'],
            'addresses' => $users->addresses()
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        if($this->type === 'multiple') {
            return ['users' => $this->mountUser($this->users)];
        } else {
            return ['user' => $this->oneUser($this->users)];
        }
    }
}
