<?php

declare(strict_types=1);

namespace App\Application\Actions\Category;

use Psr\Http\Message\ResponseInterface as Response;

class ViewCategoryAction extends CategoryAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $categoryId = (int) $this->resolveArg('id');
        $category = $this->categoryService->findOneById($categoryId);

        $this->logger->info("User of id `${categoryId}` was viewed.");

        return $this->respondWithData($category);
    }
}
