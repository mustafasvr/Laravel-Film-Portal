<?php

namespace App\Providers;

use App\Models\Admin\Settings;
use Illuminate\Support\ServiceProvider;

class settingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \config()->set('settings',Settings::pluck('settings_value','settings_name')->all());
    }
}
