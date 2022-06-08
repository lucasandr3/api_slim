<?php

declare(strict_types=1);

namespace App\Domain\Banner;

use App\Infrastructure\Persistence\Banner\Banner;

class BannerRepository implements BannerRepositoryInterface
{
    private Banner $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->banner->all();
    }
}
