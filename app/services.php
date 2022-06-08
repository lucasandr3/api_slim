<?php

declare(strict_types=1);

use App\Domain\Banner\BannerRepository;
use App\Domain\Banner\BannerService;
use App\Domain\Category\CategoryRepository;
use App\Domain\Category\CategoryService;
use App\Domain\User\UserRepository;
use App\Domain\User\UserService;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserService::class => function (ContainerInterface $container) {
            return new UserService(
                $container->get(UserRepository::class)
            );
        },
        CategoryService::class => function (ContainerInterface $container) {
            return new CategoryService(
                $container->get(CategoryRepository::class)
            );
        },
        BannerService::class => function (ContainerInterface $container) {
            return new BannerService(
                $container->get(BannerRepository::class)
            );
        },
    ]);
};
