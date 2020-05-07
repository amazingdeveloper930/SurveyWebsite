<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SettingsService;
use App\Country;
use App\Occupation;
use App\Language;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        SettingsService::storeSettings();
        view()->composer('*', function ($view) {
            $country_list = Country::pluck('country', 'id', 'iso');
            $language_list = Language::pluck('language', 'id', 'iso');
            $occupation_list = Occupation::pluck('occupation', 'id');
            $view->with('country_list', $country_list);
            $view->with('language_list', $language_list);
            $view->with('occupation_list', $occupation_list);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
