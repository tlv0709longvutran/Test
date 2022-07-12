<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Input\Button;
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
        Blade::if('env', function ($value) {
            // Trả về giá trị boolean
            if(config('app.env')==$value){
                return true;
            }

            return false;
            //return app()->environment($environment);
        });

        Blade::component('alert' , Alert::class);

        Blade::component('button' , Button::class);


    }
}
