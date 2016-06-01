<?php namespace Url\Shortner;

use Illuminate\Support\ServiceProvider;

class LittleServiceProvider extends ServiceProvider 
{

    public function register()
    {
       $this->app->bind('Little', 'Url\Shortner\LittleService');
    }
}
