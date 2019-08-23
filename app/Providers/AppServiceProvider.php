<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Phirehose;
use App\Streamer;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Streamer', function($app){
            $tweet_token =env('TWITTER_ACCESS_TOKEN',null);
            $tweet_token_secret = env('TWITTER_ACCESS_TOKEN_SECRET',null);

            return new Streamer($tweet_token,$tweet_token_secret,Phirehose::METHOD_FILTER);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
