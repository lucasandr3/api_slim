<?php


namespace App\Domain\User;


interface UserServiceInterface
{
    public function findAll();

    public function findOneById(int $id);
}