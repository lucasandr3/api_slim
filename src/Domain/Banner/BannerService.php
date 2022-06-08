<?php

namespace App\Domain\Banner;

class BannerService implements BannerServiceInterface
{
    private BannerRepositoryInterface $bannerRepository;

    public function __construct(
        BannerRepositoryInterface $bannerRepository
    ) {
        $this->bannerRepository = $bannerRepository;
    }

    public function findAll()
    {
        $banners = $this->bannerRepository->findAll();
        if ($banners->isEmpty()) {
            return new BannerNotFoundException();
        }
        return $banners;
    }
}
