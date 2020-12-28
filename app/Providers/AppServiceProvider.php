<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //check that app is local
        if ($this->app->isLocal()) {
        //if local register your services you require for development
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        } else {
        //else register your services you require for production
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Get details from in `users` table to serve as relation base table
        view()->composer('layouts.partials.*', function($view){

            $view->with('user', Auth::user());
        });
    }
}
