<?php

namespace App\Providers;

use App\Repositories\SoccerRepository;
use App\Repositories\TeamRepository;
use App\Repositories\PlayerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SoccerRepository::class, TeamRepository::class);
        $this->app->bind(SoccerRepository::class, PlayerRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
