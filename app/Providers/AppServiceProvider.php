<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Presenters\AppPresenter;


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
  
        $appPresenter = new AppPresenter();
    
        view()->share('appPresenter', $appPresenter);
    
        View::share('totalValue', $appPresenter->getTotalValue());
    }

    
}
