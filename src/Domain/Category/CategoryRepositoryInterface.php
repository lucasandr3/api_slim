<?php

declare(strict_types=1);

namespace App\Domain\Category;

interface CategoryRepositoryInterface
{
    /**
     *
     */
    public function findAll();

    /**
     * @param int $id
     * @throws CategoryNotFoundException
     */
    public function findCategoryOfId(int $id);
}
