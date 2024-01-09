<?php
namespace TrueMe\MatualExclusion;

use Carbon\Carbon;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class MatualExclusion
{
    protected $cacheMinute = 10;
    protected $result = null;
    protected $newCriticalRegion = null;
    protected $criticalRegion = null;
    protected $rememberKey = null;
    protected $cache = null;

    public function __construct()
    {
        $this->cache = new FilesystemAdapter();
    }

    public function setRememberKey($reKey='')
    {
        $this->rememberKey = $reKey;
        return $this;
    }

    protected function setCriticalRegion($value='')
    {
        return $this->criticalRegion = $value;
    }

    protected function lastest()
    {
        $this->result = $this->newCriticalRegion;

        $cache = $this->cache->getItem($this->rememberKey);
        if ($cache->isHit())
            if ($cache->get() > $this->criticalRegion) 
                $this->result = $cache->get() + ($this->newCriticalRegion - $this->criticalRegion); 

        return $this->remember();
    }

    public function get()
    {
        return $this->result;
    }

    protected function remember()
    {
        $this->cache->save($this->cache->getItem($this->rememberKey)->set($this->result));

        return $this;
    }
}