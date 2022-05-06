<?php

namespace Milleniumprod\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Milleniumprod\Contact\ContactController');
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'contact');

        $this->publishes([
            __DIR__.'../../../database/migrations/' => database_path('migrations'),
            __DIR__.'../../../routes/web.php' => __DIR__.'/routes.php'
        ], 'contact-default');
    }
}
