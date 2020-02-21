<?php

namespace App\Providers;

use App\Http\View\Composers\MenuComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', MenuComposer::class);
        View::share('hours', config('enums.hour'));
        View::share('efforts', config('enums.effort'));
        Paginator::defaultView('vendor.pagination.default');
    }
}
