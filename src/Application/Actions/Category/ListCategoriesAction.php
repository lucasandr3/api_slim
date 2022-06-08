<?php

declare(strict_types=1);

namespace App\Application\Actions\Category;

use Psr\Http\Message\ResponseInterface as Response;

class ListCategoriesAction extends CategoryAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $categories = $this->categoryService->findAll();

        $this->logger->info("Users list was viewed.");

        return $this->respondWithData($categories);
    }
}
