<?php

declare(strict_types=1);

namespace App\Domain\Category;

use App\Infrastructure\Persistence\Category\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->category->all();
    }

    /**
     * {@inheritdoc}
     */
    public function findCategoryOfId(int $id)
    {
        return $this->category->find($id);
    }
}
