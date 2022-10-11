<?php

namespace App\Providers;

use App\Enum\StatusEnum;
use App\Enum\TypeEnum;
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
        Schema::defaultStringLength(191);

        view()->composer('*',function($view) {
            $view->with('statuses', StatusEnum::cases());
            $view->with('types', TypeEnum::cases()); 
        });
    }
}
