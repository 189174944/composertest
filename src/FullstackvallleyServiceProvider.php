<?php

namespace Hello;

use Illuminate\Support\ServiceProvider;

class FullstackvallleyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes/api.php';
        }

        $this->publishes([
            __DIR__.'/config/fullstackvalley.php' => config_path('fullstackvalley.php')
        ]);
        $this->loadViewsFrom(__DIR__.'/views', 'fullstackvalley');

    }
    public function register()
    {
        $this->app->bind('fullstackvalley',function (){
            return new Person();
        });
    }
}