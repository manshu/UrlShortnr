<?php namespace Url\Shortner;

use Url\Exceptions\NonExistentHashException;
use Url\Repositories\LinkRepoInterface;
use Url\Utilities\UrlHasher;
class LittleService
{
    protected $linkrepo;
    private   $urlHasher;
    /**
     * LittleService constructor.
     * @param $linkrepo
     */
    public function __construct(LinkRepoInterface $linkrepo, UrlHasher $urlHasher)
    {
        $this->linkrepo = $linkrepo;
        $this->urlHasher = $urlHasher;
    }

    public function make($url)
    {
        $link = $this->linkrepo->byUrl($url);

        return $link ? $link->hash : $this->makeHash($url);
    }
    public function geturlbyHash($hash)
    {
        $link = $this->linkrepo->byHash($hash);

        if(! $link) throw new NonExistentHashException;

        return $link->url;
    }

    private function makeHash($url)
    {
        $hash = $this->urlHasher->make($url);
        $data = compact('url', 'hash');
        \Event::fire('link.creating', [$data]);
        $this->linkrepo->create($data);
        return $hash;
    }
}
