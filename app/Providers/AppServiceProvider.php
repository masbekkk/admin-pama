<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        Validator::extend('numeric_with_thousand_separator', function ($attribute, $value, $parameters, $validator) {
            // Remove thousand separators (comma) and check if the result is a numeric value
            $valueWithoutSeparator = str_replace(',', '', $value);

            return is_numeric($valueWithoutSeparator);
        });

        Blade::if('notDepthead', function () {
            $user = auth()->user();
            return $user && $user->role !== 'depthead';
        });
    }
}
