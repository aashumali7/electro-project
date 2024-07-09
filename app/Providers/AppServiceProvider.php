<?php

namespace App\Providers;

use App\Models\SystemInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $app_name = SystemInfo::where('meta_name', 'app_name')->first()->meta_value;
        $app_version = SystemInfo::where('meta_name', 'app_version')->first()->meta_value;
        $app_logo = SystemInfo::where('meta_name', 'app_logo')->first()->meta_value;

        $data = [
            'app_name' => $app_name,
            'app_version' => $app_version,
            'app_logo' => $app_logo
        ]; 

        // Share data with all views
        View::share('appData', $data);
    }
}
