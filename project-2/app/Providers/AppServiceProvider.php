<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //默認情況下，Blade(和Laravel e 助手)會對HTML實體雙重編碼。如果你想禁用雙重編碼，請使用以下程式
        Blade::withoutDoubleEncoding();
    }
}
