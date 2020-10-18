<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//informações globais
use Illuminate\Support\Facades\View;

//criando atalhos
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('version', '1.0');

//        atalho
        Blade::component('components.alert', 'alert');

    }
}
