<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\SocialLink;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Pass data to views.
     *
     * This method is used to pass the 'socialLinks' data to specific views
     * such as 'components.header' and 'components.footer'.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer(['components.header', 'components.footer', 'pages.contact.index'], function ($view) {
            $view->with('socialLinks', SocialLink::all());
        });
    }

    /**
     * Register any application services.
     *
     * This method is typically used to register any application-wide services.
     * For this example, we don't need to register anything, so it's empty.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
