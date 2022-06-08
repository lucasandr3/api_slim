<?php

declare(strict_types=1);

use App\Application\Actions\Banner\ListBannerAction;
use App\Application\Actions\Category\ListCategoriesAction;
use App\Application\Actions\Category\ViewCategoryAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Infrastructure\Bootstrap;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {

    $container = $app->getContainer();
    Bootstrap::load($container);

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/categories', function (Group $group) {
        $group->get('', ListCategoriesAction::class);
        $group->get('/{id}', ViewCategoryAction::class);
    });

    $app->group('/banners', function (Group $group) {
        $group->get('', ListBannerAction::class);
    });
};
