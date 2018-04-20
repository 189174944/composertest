<?php

namespace Hello;

use Illuminate\Support\ServiceProvider;

class ExcelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/fullstackvalley.php' => config_path('fullstackvalley.php')
        ]);
    }
    public function register()
    {

    }
}