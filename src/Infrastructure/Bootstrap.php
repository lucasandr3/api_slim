<?php

namespace App\Infrastructure;

use App\Application\Settings\SettingsInterface;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

final class Bootstrap
{
    public static function load($container)
    {
        $settings = $container->get(SettingsInterface::class);
        $capsule = new Capsule();
        $capsule->addConnection($settings->get('default'));
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}