<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepositoryInterface
{
    /**
     *
     */
    public function findAll();

    /**
     * @param int $id
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id);
}
