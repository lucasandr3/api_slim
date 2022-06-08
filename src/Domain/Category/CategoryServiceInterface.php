<?php


namespace App\Domain\Category;


interface CategoryServiceInterface
{
    public function findAll();

    public function findOneById(int $id);
}