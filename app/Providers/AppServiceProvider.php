<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilProgres;
use Illuminate\Pagination\Paginator;


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
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {

            if (Auth::check() && Auth::user()->role == 'mahasiswa') {
                $progress = HasilProgres::where('id_users', Auth::id())->first();
            } else {
                $progress = null;
            }

            $view->with('progress', $progress);
        });
    }
}
