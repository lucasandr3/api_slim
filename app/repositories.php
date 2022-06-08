<?php

declare(strict_types=1);

use App\Domain\Banner\BannerRepository;
use App\Domain\Category\CategoryRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Banner\Banner;
use App\Infrastructure\Persistence\Category\Category;
use App\Infrastructure\Persistence\User\User;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserRepository::class => function () {
            return new UserRepository(new User());
        },
        CategoryRepository::class => function () {
            return new CategoryRepository(new Category());
        },
        BannerRepository::class => function () {
            return new BannerRepository(new Banner());
        },
    ]);
};
