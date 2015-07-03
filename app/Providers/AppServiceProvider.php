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
       $this->app->bind(
            'App\Binary\Smartphone\ISmartphone',
            'App\Binary\Smartphone\Smartphone'
        );

       $this->app->bind('Smartphone', Smartphone::class);

       $this->app->bind('CustomSmartphone', function ($app) {
            return new Smartphone('Iphone',
                new Processor('IphoneCPU', '2'),
                new Display('280','480'),
                new Camera('5'),
                new Battery('2000')
               
            );
        });

        $smartphone = new Smartphone("AnotherCustomSmartphone", 
                                    new Processor('Intel CPU','4'), 
                                    new Display('500','500'), 
                                    new Camera('20'), 
                                    new Battery('2000'));

        $this->app->instance('AnotherCustomSmartphone', $smartphone);

       
    }
}
