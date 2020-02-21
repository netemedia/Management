<?php

namespace App\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        FormFacade::macro('status', fn(
            string $name,
            string $class = ''
        ) => "<input type=\"submit\" class=\"$class\" value=\"$name\" />");
    }
}
