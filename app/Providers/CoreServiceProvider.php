<?php

namespace App\Providers;

use App\Repositories\EloquentCreateSellerRepository;
use App\Repositories\EloquentSellerExistsByEmailRepository;
use Core\UseCase\Contracts\CreateSellerRepository;
use Core\UseCase\Contracts\SellerExistsByEmailRepository;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function register(): void {
        $this->app->singleton(CreateSellerRepository::class,        EloquentCreateSellerRepository::class);
        $this->app->singleton(SellerExistsByEmailRepository::class, EloquentSellerExistsByEmailRepository::class);
    }

    public function boot(): void {}
}
