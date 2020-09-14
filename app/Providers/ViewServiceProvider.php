<?php


namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
     
        // Using class based composers...
        View::composer(
            [
                'welcome', 'frontend.about','frontend.checkout','frontend.blogs',
            'frontend.products',
             'frontend.product-details', 'frontend.layouts.partials.header'

            ], 'App\Http\View\Composers\FrontendComposer'
        );

    }
}
