<?php

namespace App\Providers;

use App\Binary\Smartphone\Smartphone;
use App\Binary\Smartphone\Battery;
use App\Binary\Smartphone\Camera;
use App\Binary\Smartphone\Display;
use App\Binary\Smartphone\Processor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {  
        // Interface to implementation binding
        $this->app->bind(
            'App\Binary\UserRepository',
            'App\Binary\Repository\ArrayUserRepository'
        );
    }
}
