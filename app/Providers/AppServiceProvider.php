<?php

namespace App\Providers;

use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
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
        // Option 1 => every view page
        // \View::share('channels', Channel::orderBy('name')->get());

        // Option 2 => granular views with wildcard
        // \View::composer(['Channel.index','Post.create'], function ($view) {
        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        //Option 3 => dedicate class
        // \View::composer(['channel.index', 'post.*'], ChannelsComposer::class);

        \View::composer(['partials.channel.*'], ChannelsComposer::class);
    }
}
