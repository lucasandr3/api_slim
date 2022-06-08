<?php

declare(strict_types=1);

namespace App\Application\Actions\Banner;

use Psr\Http\Message\ResponseInterface as Response;

class ListBannerAction extends BannerAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $banners = $this->bannerService->findAll();

        $this->logger->info("Banners list was viewed.");

        return $this->respondWithData($banners);
    }
}
