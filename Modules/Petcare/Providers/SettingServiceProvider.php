<?php

namespace Modules\Petcare\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Petcare\Interfaces\SettingRepositoryInterface;
use Modules\Petcare\Repositories\SettingRepository;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
