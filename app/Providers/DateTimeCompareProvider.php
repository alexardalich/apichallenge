<?php

namespace App\Providers;

use App\CarbonDateTimeComparer;
use App\DateTimeComparer;
use App\DiffDateTimeComparer;
use Illuminate\Support\ServiceProvider;

class DateTimeCompareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (config('apichallenge.date_time_comparer') == 'carbon') {

            $this->app->singleton(DateTimeComparer::class, CarbonDateTimeComparer::class);

        } else {

            $this->app->singleton(DateTimeComparer::class, DiffDateTimeComparer::class);

        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
