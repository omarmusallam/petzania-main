<?php

namespace Modules\Petcare\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Petcare\Interfaces\ServiceRepositoryInterface;
use Modules\Petcare\Repositories\ServiceRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
