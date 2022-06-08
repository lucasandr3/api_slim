<?php

declare(strict_types=1);

namespace App\Application\Actions\Banner;

use App\Application\Actions\Action;
use App\Domain\Banner\BannerRepository;
use App\Domain\Banner\BannerService;
use Psr\Log\LoggerInterface;

abstract class BannerAction extends Action
{
    protected BannerService $bannerService;
    protected BannerRepository $bannerRepository;

    public function __construct
    (
        LoggerInterface $logger,
        BannerService $bannerService,
        BannerRepository $bannerRepository
    )
    {
        parent::__construct($logger);
        $this->bannerService = $bannerService;
        $this->bannerRepository = $bannerRepository;
    }
}
