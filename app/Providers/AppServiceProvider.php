<?php

namespace App\Providers;

use App\Models\Mood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL; // <-- Tambahan wajib untuk Vercel
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // --- SUNTIKAN HTTPS UNTUK VERCEL ---
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
        // -----------------------------------

        View::composer('layouts.app', function ($view) {
            $currentMood = null;

            if (Auth::check()) {
                $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
            }

            $view->with('currentMood', $currentMood);
        });
    }
}