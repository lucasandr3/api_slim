<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Infrastructure\Persistence\User\User;

class UserRepository implements UserRepositoryInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->user->all();
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id)
    {
        return $this->user->find($id);
    }
}
