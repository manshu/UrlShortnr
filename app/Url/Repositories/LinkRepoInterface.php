<?php

namespace Url\Repositories;

interface LinkRepoInterface
{
    public function byHash($hash);
    public function byUrl($url);
    public function create(array $data);
}