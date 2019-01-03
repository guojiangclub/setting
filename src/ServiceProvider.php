<?php

/*
 * This file is part of ibrand/setting.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Component\Setting;

use iBrand\Component\Setting\Models\SystemSetting;
use iBrand\Component\Setting\Repositories\CacheDecorator;
use iBrand\Component\Setting\Repositories\EloquentSetting;
use iBrand\Component\Setting\Repositories\SettingInterface;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

/**
 * Class ServiceProvider
 * @package iBrand\Component\Setting
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * boot service provider
     */
    public function boot()
    {
        $this->registerMigrations();

        $this->publishes([
            __DIR__ . '/config.php' => config_path('ibrand/setting.php'),
        ]);
    }

    /**
     * register service provider
     */
    public function register()
    {
        // merge configs
        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'ibrand.setting'
        );

        $this->app->singleton(SettingInterface::class, function ($app) {
            $repository = new EloquentSetting(new SystemSetting());

            if (!config('ibrand.setting.cache')) {
                return $repository;
            }

            return new CacheDecorator($repository);
        });

        $this->app->alias(SettingInterface::class, 'system_setting');
    }

    /**
     * Register Passport's migration files.
     */
    protected function registerMigrations()
    {
        return $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [SettingInterface::class, 'system_setting'];
    }
}
