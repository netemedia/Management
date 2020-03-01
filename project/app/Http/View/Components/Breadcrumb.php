<?php

namespace App\Http\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Netemedia\Component\Component;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;

class Breadcrumb extends Component
{
    public function breadcrumb()
    {
        $uri   = Route::current()->uri;
        $class = 'text-gray-600 no-underline';

        $menu = Menu::new()->addClass('flex')->add(Link::to('/', 'Dashboard')->addClass($class));

        if ( $uri && $uri !== '/' ) {
            $explode = explode("/", $uri);
            $route   = "";
            foreach ( $explode as $element ) {
                $route = $route ? "{$route}/{$element}" : "$element";
                $menu->html('/', [ 'class' => 'mx-2' ])->add(Link::to("/$route", Str::ucfirst($element))
                                                                 ->addClass($class));
            }
        }

        return $menu;
    }
}