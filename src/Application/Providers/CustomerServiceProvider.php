<?php

namespace Src\Application\Providers;

use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(base_path('src/Infrastructure/Migrations'));

        $this->loadFactoriesFrom('src/Infrastructure/Factories');
    }

    public function register()
    {
        $this->app->bind(
            'Src\Domain\Contracts\UserRepository',
            'Src\Infrastructure\Repositories\MysqlUserRepository'
        );

        $this->app->bind(
            'Src\Domain\Contracts\CustomerRepository',
            'Src\Infrastructure\Repositories\MysqlCustomerRepository'
        );


        $this->app->bind(
            'Src\Domain\Contracts\HobbieRepository',
            'Src\Infrastructure\Repositories\MysqlHobbieRepository'
        );

        $this->app->bind(
            'Src\Domain\Contracts\CustomerHobbieRepository',
            'Src\Infrastructure\Repositories\MysqlCustomerHobbieRepository'
        );

    }
}
