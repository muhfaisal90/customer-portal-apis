<?php

namespace App\Providers;

use App\Models\api\v1\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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

        // Fixing MySQL import issue by using below snippet
        Schema::defaultStringLength(191);

        // setting up config from DB settings table for global use
        if (Schema::hasTable('settings')) {
            foreach (Setting::all() as $setting) {
                Config::set('settings.'.$setting->name, $setting->value);
            }
        }
    }

}
