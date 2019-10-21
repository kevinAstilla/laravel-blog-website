<?php

namespace App\Providers;

use \App\Billing\Stripe;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){

            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives','tags'));

            // $view->with('archives', \App\Post::archives());
            // $view->with('tags', \App\Tag::has('posts')->pluck('name'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         //\App::singleton('App\Billing\Stripe', function () {
        $this->app->singleton(Stripe::class, function () {
            //$app->make()
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
