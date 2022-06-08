<?php

declare(strict_types=1);

namespace App\Domain\Banner;

interface BannerRepositoryInterface
{
    public function findAll();
}
