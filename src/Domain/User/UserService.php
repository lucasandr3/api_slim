<?php

namespace App\Domain\User;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function findAll()
    {
        $users = $this->userRepository->findAll();
        if ($users->isEmpty()) {
            throw new UserNotFoundException();
        }
        return new UserDTO($users, 'multiple');
    }

    public function findOneById(int $id)
    {
        $user = $this->userRepository->findUserOfId($id);
        if ($user === null) {
            throw new UserNotFoundException();
        }
        return new UserDTO($user, 'single');
    }
}
