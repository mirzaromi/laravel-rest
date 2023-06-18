<?php

namespace App\Providers;

use App\Repository\AuthRepository;
use App\Repository\Implementation\AuthRepositoryImplementation;
use App\Repository\Implementation\TransactionRepositoryImplementation;
use App\Repository\TransactionRepository;
use App\Service\AuthService;
use App\Service\Implementation\AuthServiceImplementation;
use App\Service\Implementation\TransactionServiceImplementation;
use App\Service\TransactionService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Service
        $this->app->bind(TransactionService::class, TransactionServiceImplementation::class);
        $this->app->bind(AuthService::class, AuthServiceImplementation::class);

        // Repository
        $this->app->bind(TransactionRepository::class, TransactionRepositoryImplementation::class);
        $this->app->bind(AuthRepository::class, AuthRepositoryImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
