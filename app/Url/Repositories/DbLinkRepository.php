<?php namespace Url\Repositories;

use App\Link;

class DbLinkRepository implements LinkRepoInterface
{
    public function byHash($hash)
    {
        return Link::whereHash($hash)->first();

    }

    public function byUrl($url)
    {
        return Link::whereUrl($url)->first();
    }

    public function create(array $data)
    {
        return Link::create($data);
    }
}