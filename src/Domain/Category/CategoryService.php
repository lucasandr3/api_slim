<?php

namespace App\Domain\Category;

use App\Domain\Category\CategoryDTO;

class CategoryService implements CategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function findAll()
    {
        $categories = $this->categoryRepository->findAll();
        if ($categories->isEmpty()) {
            return new CategoryNotFoundException();
        }
        return new CategoryDTO($categories, 'multiple');
    }

    public function findOneById(int $id)
    {
        $category = $this->categoryRepository->findCategoryOfId($id);
        if ($category === null) {
            return new CategoryNotFoundException();
        }
        return new CategoryDTO($category, 'single');
    }
}
