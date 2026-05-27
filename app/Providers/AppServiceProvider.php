<?php

namespace App\Providers;

use App\Models\Mood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('layouts.app', function ($view) {
            $currentMood = null;

            if (Auth::check()) {
                $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
            }

            $view->with('currentMood', $currentMood);
        });
    }
}