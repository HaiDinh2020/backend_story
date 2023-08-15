<?php

namespace App\Providers;

use App\Repositories\Story\StoryRepository;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StoryRepositoryInterface::class, StoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        $this->app->bind(StoryRepositoryInterface::class, StoryRepository::class);
    }
}
