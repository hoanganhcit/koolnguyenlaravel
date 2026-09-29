<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);

        View::composer('admin.partials.sidebar', function ($view) {
            $view->with('pendingBookingCount', Booking::where('status', 'pending')->count());
        });

        View::composer(['FE.layouts.app', 'admin.layouts.app', 'admin.partials.sidebar'], function ($view) {
            static $siteSettings;

            if ($siteSettings === null) {
                $siteSettings = Schema::hasTable('site_settings')
                    ? \Illuminate\Support\Facades\DB::table('site_settings')->pluck('value', 'key')
                    : collect();
            }

            $view->with('siteSettings', $siteSettings);
        });
    }
}
