<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

 
class Helper extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['helper'] = $this->app->share(function ($app) {
           return new \App\Services\Helper;
        });
    }
}