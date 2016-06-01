<?php namespace Url\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('Url\Repositories\LinkRepoInterface', 'Url\Repositories\DbLinkRepository');
    }
}
