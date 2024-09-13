<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('validGenres', ["Pop", "Hip Hop", "Rock", "Metal", "Electronics"]);
            $view->with('validFormats', ["CD", "Vinyl", "Casette", "Digital download"]);
        });
    }
}