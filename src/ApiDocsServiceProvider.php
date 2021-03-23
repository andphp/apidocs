<?php

namespace AndPHP\ApiDocs;

use Illuminate\Support\ServiceProvider;

class ApiDocsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/docs.php' => config_path('docs.php'),
        ]);
    }
}
