<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NotifikasiDisposisi;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sharing variable with all views
        View::share('notifikasi', NotifikasiDisposisi::latest()->paginate(10)->withQueryString());
    }
}
