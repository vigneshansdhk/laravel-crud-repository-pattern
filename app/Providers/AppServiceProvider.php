<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bindServices();
        $this->bindRepositories();
    }

    protected function bindServices()
    {
        $services = [
            'Product'
        ];

        foreach ($services as $service) {
            $interface = "App\\Services\\{$service}Interface";
            $implementation = "App\\Services\\{$service}Service";
            $this->app->bind($interface, $implementation);
        }
    }

    protected function bindRepositories()
    {
        $repositories = [
            'Product'
        ];

        foreach ($repositories as $repository) {
            $interface = "App\\Repositories\\{$repository}Contract";
            $implementation = "App\\Repositories\\{$repository}Eloquent";
            $this->app->bind($interface, $implementation);
        }
    }
}
